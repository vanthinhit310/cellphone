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
}
