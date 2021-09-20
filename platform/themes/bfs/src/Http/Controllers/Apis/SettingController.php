<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Setting;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
    protected $request;
    protected $response;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getSettings()
    {
        $settings = Setting::all();
        return response()->json(["settings" => $settings], Response::HTTP_OK);
    }

}
