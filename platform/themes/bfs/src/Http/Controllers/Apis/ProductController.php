<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Supports\Helper;
use Platform\Ecommerce\Models\Product;
use Platform\SeoHelper\SeoOpenGraph;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use SlugHelper;
use SeoHelper;
use RvMedia;
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
        $data = get_products_by_collections([
            'collections' => ['by' => 'slug', 'value_in' => ['selling-products']],
            'take' => 15,
            'with' => ['slugable', 'promotions']
        ]);

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
                'categories',
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
//        return response()->json(["product" => $product], Response::HTTP_OK);
    }

}
