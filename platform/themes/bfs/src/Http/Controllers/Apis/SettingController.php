<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RvMedia;
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
        $settings = [
            "ecommerce_store_name" => setting('ecommerce_store_name'),
            "ecommerce_store_phone" => setting('ecommerce_store_phone'),
            "theme--shop_map" => setting('theme--shop_map'),
            "theme--shop_facebook_link" => setting('theme--shop_facebook_link'),
            "theme--shop_zalo_link" => setting('theme--shop_zalo_link'),
            "theme--shop_email" => setting('theme--shop_email'),
            "theme--logo" => RvMedia::getImageUrl(setting('theme--logo')),
            "theme--home_banner_1" => RvMedia::getImageUrl(setting('theme--home_banner_1')),
            "theme--home_banner_2" => RvMedia::getImageUrl(setting('theme--home_banner_2')),
            "theme--copyright" => setting('theme--copyright'),
        ];
        return response()->json(["settings" => $settings], Response::HTTP_OK);
    }

}
