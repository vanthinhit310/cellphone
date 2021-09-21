<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Setting;
use Symfony\Component\HttpFoundation\Response;
use RvMedia;

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
//        $settings = Setting::all();
        $settings = [
            "ecommerce_store_name" =>setting('ecommerce_store_name'),
            "ecommerce_store_phone" =>setting('ecommerce_store_phone'),
            "ecommerce_store_address" =>setting('ecommerce_store_address'),
            "theme--logo" => RvMedia::getImageUrl(setting('theme--logo')),
            "theme--copyright" =>setting('theme--copyright'),
        ];
        return response()->json(["settings" => $settings], Response::HTTP_OK);
    }

}
