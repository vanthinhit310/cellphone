<?php

namespace Theme\Main\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\SimpleSlider\Repositories\Interfaces\SimpleSliderInterface;
use Platform\Theme\Events\RenderingHomePageEvent;
use Theme;
use SeoHelper;

class MainController extends Controller
{
    public function index()
    {
        SeoHelper::setTitle(theme_option('site_title'));

        Theme::breadcrumb()->add(__('Home'), url('/'));

        event(RenderingHomePageEvent::class);

        $data = [];

        $data['sliders'] = app(SimpleSliderInterface::class)->getFirstBy([
            'key' => 'home-slider',
            'status' => BaseStatusEnum::PUBLISHED,
        ])->sliderItems;

        $data['categories'] = get_product_categories(['status' => BaseStatusEnum::PUBLISHED], ['slugable', 'children', 'children.slugable'], [], true);

        $data['productHot'] = get_products_by_collections([
            'collections' => ['by' => 'slug', 'value_in' => ['hot']],
            'take' => 10,
            'with' => ['slugable', 'variations', 'productCollections', 'variationAttributeSwatchesForProductList', 'promotions',],
        ]);

        $data['productSale'] = get_products_by_collections([
            'collections' => ['by' => 'slug', 'value_in' => ['sale']],
            'take' => 10,
            'with' => ['slugable', 'variations', 'productCollections', 'variationAttributeSwatchesForProductList', 'promotions',],
        ]);

        $data['productNews'] = get_products_by_collections([
            'collections' => ['by' => 'slug', 'value_in' => ['news']],
            'take' => 10,
            'with' => ['slugable', 'variations', 'productCollections', 'variationAttributeSwatchesForProductList', 'promotions',],
        ]);

        return Theme::scope('index', $data)->render();
    }
}
