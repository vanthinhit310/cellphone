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

}
