<?php

theme_option()
    ->setSection([
        'title' => __('Infomation'),
        'desc' => __('General settings'),
        'id' => 'opt-text-subsection-infomation',
        'subsection' => true,
        'icon' => 'fa fa-info',
        'fields' => [
            [
                'id' => 'shop-map',
                'type' => 'text',
                'label' => __('Shop map'),
                'attributes' => [
                    'name' => 'shop_map',
                    'value' => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ],
            [
                'id' => 'shop-facebook',
                'type' => 'text',
                'label' => __('Shop facebook link'),
                'attributes' => [
                    'name' => 'shop_facebook_link',
                    'value' => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ],
            [
                'id' => 'shop-zalo-link',
                'type' => 'text',
                'label' => __('Shop zalo link'),
                'attributes' => [
                    'name' => 'shop_zalo_link',
                    'value' => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ],
            [
                'id' => 'shop-email',
                'type' => 'text',
                'label' => __('Shop email'),
                'attributes' => [
                    'name' => 'shop_email',
                    'value' => null,
                    'options' => [
                        'class' => 'form-control',
                    ],
                ],
            ],
        ],
    ])
    ->setSection([
        'title' => __('Banner Ads'),
        'desc' => __('Banner settings'),
        'id' => 'opt-text-subsection-banner',
        'subsection' => true,
        'icon' => 'fa fa-image',
        'fields' => [
            [
                'id' => 'banner-01',
                'type' => 'mediaImage',
                'label' => __('Home Banner 1'),
                'attributes' => [
                    'name' => 'home_banner_1',
                ],
            ],
            [
                'id' => 'banner-02',
                'type' => 'mediaImage',
                'label' => __('Home Banner 2'),
                'attributes' => [
                    'name' => 'home_banner_2',
                ],
            ],
        ],
    ])
    ->setField([
        'id' => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type' => 'text',
        'label' => __('Copyright'),
        'attributes' => [
            'name' => 'copyright',
            'value' => '© 2021 Laravel Technologies. All right reserved.',
            'options' => [
                'class' => 'form-control',
                'placeholder' => __('Change copyright'),
                'data-counter' => 250,
            ],
        ],
        'helper' => __('Copyright on footer of site'),
    ])
    ->setField([
        'id' => 'primary_font',
        'section_id' => 'opt-text-subsection-general',
        'type' => 'googleFonts',
        'label' => __('Primary font'),
        'attributes' => [
            'name' => 'primary_font',
            'value' => 'Roboto',
        ],
    ])
    ->setField([
        'id' => 'primary_color',
        'section_id' => 'opt-text-subsection-general',
        'type' => 'customColor',
        'label' => __('Primary color'),
        'attributes' => [
            'name' => 'primary_color',
            'value' => '#ff2b4a',
        ],
    ]);
