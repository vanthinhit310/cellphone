<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Base\Enums\BaseStatusEnum;
use Symfony\Component\HttpFoundation\Response;
use Theme\Bfs\Http\Resources\Apis\ProductCategoryResource;

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

}
