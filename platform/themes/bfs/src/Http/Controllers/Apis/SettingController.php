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
            "theme_shop_map" => theme_option('shop_map'),
            "theme_shop_facebook_link" => theme_option('shop_facebook_link'),
            "theme_shop_zalo_link" => theme_option('shop_zalo_link'),
            "theme_shop_email" => theme_option('shop_email'),
            "theme_logo" => RvMedia::getImageUrl(theme_option('logo')),
            "theme_home_banner_1" => RvMedia::getImageUrl(theme_option('home_banner_1')),
            "theme_home_banner_2" => RvMedia::getImageUrl(theme_option('home_banner_2')),
            "theme_copyright" => theme_option('copyright'),
        ];
        return response()->json(["settings" => $settings], Response::HTTP_OK);
    }

}
