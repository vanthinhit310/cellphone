<?php

namespace Theme\Main\Http\Controllers;

use Illuminate\Routing\Controller;
use Theme;

class ProductController extends Controller
{
    public function getProductDetail($category, $slug){
        $data = [];
        Theme::breadcrumb()->add('Google', 'https://google.com.vn')->add('Facebook', 'https://:facebook.com');
        return Theme::scope("product", $data)->render();
    }
}
