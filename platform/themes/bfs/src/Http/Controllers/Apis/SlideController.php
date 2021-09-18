<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Base\Http\Responses\BaseHttpResponse;

class SlideController extends Controller
{
    protected $request;
    protected $response;

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     */
    public function __construct(Request $request, BaseHttpResponse $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getSlides()
    {
        dd(2222);
    }

}
