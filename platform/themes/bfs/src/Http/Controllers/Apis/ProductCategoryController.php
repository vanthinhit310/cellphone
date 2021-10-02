<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Ecommerce\Models\ProductCategory;
use Platform\Ecommerce\Repositories\Interfaces\ProductCategoryInterface;
use Platform\Ecommerce\Services\Products\GetProductService;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use SlugHelper;
use Symfony\Component\HttpFoundation\Response;
use Theme\Bfs\Http\Resources\Apis\PaginationResource;
use Theme\Bfs\Http\Resources\Apis\ProductCategoryResource;
use Theme\Bfs\Http\Resources\Apis\ProductResource;

class ProductCategoryController extends Controller
{
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getCategories()
    {
        $categories = get_product_categories(['status' => BaseStatusEnum::PUBLISHED], ['slugable', 'children', 'children.slugable'], [], true);

        return response()->json([
            "categories" => ProductCategoryResource::collection($categories)
        ], Response::HTTP_OK);
    }

    public function getProductCategory($slug, Request $request, ProductCategoryInterface $categoryRepository, GetProductService $getProductService)
    {

        $slug = app(SlugInterface::class)->getFirstBy([
            'key' => $slug,
            'reference_type' => ProductCategory::class,
            'prefix' => SlugHelper::getPrefix(ProductCategory::class),
        ]);

        if (!$slug) {
            return response()->json()->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $condition = [
            'ec_product_categories.id' => $slug->reference_id,
            'ec_product_categories.status' => BaseStatusEnum::PUBLISHED,
        ];

        $category = $categoryRepository->getFirstBy($condition, ['*'], ['slugable']);

        if (!$category) {
            return response()->json()->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        $products = $getProductService->getProduct($request, $category->id, null, ['slugable', 'variations', 'productCollections', 'variationAttributeSwatchesForProductList', 'promotions']);

//        SeoHelper::setTitle($category->name)->setDescription($category->description);
//
//        $meta = new SeoOpenGraph;
//        if ($category->image) {
//            $meta->setImage(RvMedia::getImageUrl($category->image));
//        }
//        $meta->setDescription($category->description);
//        $meta->setUrl($category->url);
//        $meta->setTitle($category->name);
//
//        SeoHelper::setSeoOpenGraph($meta);

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, PRODUCT_CATEGORY_MODULE_SCREEN_NAME, $category);

        return response()->json([
            "category" => new ProductCategoryResource($category),
            "products" => ProductResource::collection($products),
            "pagination" => new PaginationResource($products)
        ], Response::HTTP_OK);
    }

}
