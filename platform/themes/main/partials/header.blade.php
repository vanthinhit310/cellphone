<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Roboto')) }}" rel="stylesheet" type="text/css">
    <!-- CSS Library-->

    <style>
        :root {
            --primary-color: {{ theme_option('primary_color', '#ff2b4a') }};
            --primary-font: '{{ theme_option('primary_font', 'Roboto') }}', sans-serif;
        }
    </style>

    {!! Theme::header() !!}
</head>
<body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
{!! apply_filters(THEME_FRONT_BODY, null) !!}
<header class="header">
    <div class="container h-100">
        <div class="header__content">
            <div class="header__content__logo">
                <div class="header__content__logo--icon">
                    <span><i class="fas fa-bars"></i></span>
                </div>
                <div class="header__content__logo--image">
                    <a href="{{ route('public.index') }}">
                        <img class="img-fluid w-100" src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="header__content__search">
                <form action="#" method="POST">
                    @csrf
                    <input class="header__content__search--input font14" type="text" placeholder="Bạn cần tìm gì?">
                    <button type="submit" class="header__content__search--button">
                        <span><i class="fas fa-search"></i></span>
                    </button>
                </form>
            </div>
            <div class="header__content__extra">
                <ul class="header__content__extra__list">
                    <li class="header__content__extra__list--item">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fas fa-phone-alt"></i></span>
                            <span class="text font14">Gọi mua hàng: <br> <strong class="font16">1800.2097</strong></span>
                        </a>
                    </li>
                    <li class="header__content__extra__list--item">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="text font14">Tìm cửa hàng</span>
                        </a>
                    </li>
                    <li class="header__content__extra__list--item">
                        <a href="javascript:void(0);">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="text font14">Giỏ hàng</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
