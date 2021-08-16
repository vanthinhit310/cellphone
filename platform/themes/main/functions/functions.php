<?php

register_page_template([
    'default' => 'Default',
    'news' => 'Tin tức'
]);

register_sidebar([
    'id' => 'second_sidebar',
    'name' => 'Second sidebar',
    'description' => 'This is a sample sidebar for main theme',
]);

RvMedia::addSize('small', 350, 250)->addSize('medium', 750, 536)->addSize('large', 1140, 815)->addSize('product', 320, 320)->addSize("slider", 690, 300);
