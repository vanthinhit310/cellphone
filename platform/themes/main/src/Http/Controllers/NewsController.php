<?php

namespace Theme\Main\Http\Controllers;

use Illuminate\Routing\Controller;
use Theme;

class NewsController extends Controller
{
    public function index()
    {
        $data = [];
        return Theme::scope("news", $data)->render();
    }

    public function getDetail()
    {
        $data = [];
        Theme::breadcrumb()->add('Tin tức', 'https://google.com.vn')->add('Thị trường', 'https://:facebook.com');
        return Theme::scope("news-detail", $data)->render();
    }
}
