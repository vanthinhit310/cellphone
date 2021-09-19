<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Response;
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
            "products" => ProductResource::collection($data)
        ], Response::HTTP_OK);
    }

}
