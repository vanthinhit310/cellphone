<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Supports\Helper;
use Platform\Ecommerce\Models\Product;
use Platform\Ecommerce\Repositories\Interfaces\ProductInterface;
use Platform\Ecommerce\Repositories\Interfaces\ProductVariationInterface;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use RvMedia;
use SeoHelper;
use SlugHelper;
use Symfony\Component\HttpFoundation\Response;
use Theme\Bfs\Http\Resources\Apis\PaginationResource;
use Theme\Bfs\Http\Resources\Apis\ProductDetailResource;
use Theme\Bfs\Http\Resources\Apis\ProductResource;

class ProductController extends Controller
{
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getFeatureProducts()
    {
        $params = [
            'take' => 15,
            'with' => ['slugable'],
        ];

        $data = get_featured_products($params);

        return response()->json([
            "products" => ProductResource::collection($data)
        ], Response::HTTP_OK);
    }

    public function getSellingProducts()
    {
        $pageSize = (int)$this->request->get('pageSize') ?? 15;

        $data = get_products_by_collections([
            'collections' => ['by' => 'slug', 'value_in' => ['selling-products']],
            'take' => $pageSize,
            'with' => ['slugable', 'promotions']
        ]);

        return response()->json([
            "products" => ProductResource::collection($data)
        ], Response::HTTP_OK);
    }

    public function getRelatedProducts()
    {
        $pageSize = (int)$this->request->get('pageSize') ?? 15;

        $params = [
            'categories' => [
                'by' => 'id',
                'value_in' => explode(',', $this->request->get('categories')),
            ],
            'take' => $pageSize,
        ];

        $data = get_products_by_categories($params);

        return response()->json([
            "products" => ProductResource::collection($data)
        ], Response::HTTP_OK);
    }

    public function getAllProducts()
    {
        $perPage = $this->request->get("perPage") ?? theme_option('number_of_products_per_page');
        $page = $this->request->get("page") ?? 1;
        $params = [
            'paginate' => [
                'per_page' => $perPage,
                'current_paged' => $page,
            ],
        ];

        $data = get_products($params);

        return response()->json([
            "products" => ProductResource::collection($data),
            "pagination" => new PaginationResource($data)
        ], Response::HTTP_OK);
    }

    public function getProductDetail($slug)
    {

        $slug = app(SlugInterface::class)->getFirstBy([
            'key' => $slug,
            'reference_type' => Product::class,
            'prefix' => SlugHelper::getPrefix(Product::class),
        ]);


        if (!$slug) {
            return response()->json(['message' => __("Resource not found", ["resource" => "Product"])], Response::HTTP_NOT_FOUND);
        }

        $condition = [
            'ec_products.id' => $slug->reference_id,
            'ec_products.status' => BaseStatusEnum::PUBLISHED,
        ];

        $product = get_products([
            'condition' => $condition,
            'take' => 1,
            'with' => [
                'defaultProductAttributes',
                'productAttributes',
                'categories',
                'variations',
                'reviews',
                'slugable',
                'tags',
                'flashSales',
                'tags.slugable',
            ],
        ]);

        if (!$product) {
            return response()->json(['message' => __("Resource not found", ["resource" => "Product"])], Response::HTTP_NOT_FOUND);
        }

        Helper::handleViewCount($product, 'viewed_product');
        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PRODUCT_CATEGORY_MODULE_SCREEN_NAME, $product);

        return response()->json(["product" => new ProductDetailResource($product)], Response::HTTP_OK);
//        dd(get_product_attributes($product->id));
//        dd($product->productAttributes);
//        return response()->json(["product" => $product], Response::HTTP_OK);
    }

    public function searchProducts()
    {
        $filters = [
            'keyword' => $this->request->get('q') ?? null,
            'order_by' => [],
            'collections' => []
        ];

        $params = [
            'take' => 5
        ];

        $products = app(ProductInterface::class)->filterProducts($filters, $params);

        return response()->json([
            "products" => ProductResource::collection($products)
        ], Response::HTTP_OK);
    }

    public function getProductVariation($id, Request $request)
    {
        $attributes = $request->input('attributes', []);

        $variation = app(ProductVariationInterface::class)->getVariationByAttributes($id, $attributes);

        $product = null;

        if ($variation) {
            $product = app(ProductInterface::class)->getProductVariations($id, [
                'condition' => [
                    'ec_product_variations.id' => $variation->id,
                    'ec_products.status' => BaseStatusEnum::PUBLISHED,
                ],
                'select' => [
                    'ec_products.id',
                    'ec_products.name',
                    'ec_products.quantity',
                    'ec_products.price',
                    'ec_products.sale_price',
                    'ec_products.allow_checkout_when_out_of_stock',
                    'ec_products.with_storehouse_management',
                    'ec_products.images',
                    'ec_products.sku',
                    'ec_products.description',
                    'original_products.images as original_images',
                ],
                'take' => 1,
            ]);

            if ($product) {
                if ($product->images) {
                    $product->image_with_sizes = rv_get_image_list($product->images, [
                        'origin',
                        'thumb',
                        'product-thumb',
                    ]);
                } else {
                    $originalImages = json_decode($product->original_images);
                    $product->image_with_sizes = rv_get_image_list($originalImages, [
                        'origin',
                        'thumb',
                        'product-thumb',
                    ]);
                }
            }
        }

        if (!$product) {
            return response()->json([
                'product' => null
            ]);
        }

        return response()->json([
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'sku' => $product->sku,
                'description' => $product->description,
                'slug' => $product->slug,
                'with_storehouse_management' => $product->with_storehouse_management,
                'quantity' => $product->quantity,
                'is_out_of_stock' => $product->isOutOfStock(),
                'price' => $product->price,
                'sale_price' => $product->front_sale_price,
                'original_price' => $product->original_price,
                'image_with_sizes' => $product->image_with_sizes,
                'display_price' => format_price($product->price),
                'display_sale_price' => format_price($product->front_sale_price),
                'sale_percentage' => get_sale_percentage($product->price, $product->front_sale_price),
            ]
        ]);
    }
}
