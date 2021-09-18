<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Http\Responses\BaseHttpResponse;
use Platform\SimpleSlider\Repositories\Interfaces\SimpleSliderInterface;
use Symfony\Component\HttpFoundation\Response;

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
        $data = app(SimpleSliderInterface::class)->getFirstBy([
            'key' => 'home-slider',
            'status' => BaseStatusEnum::PUBLISHED,
        ])->sliderItems;

        return response()->json($data ?? [])->setStatusCode(Response::HTTP_OK);
    }

}
