<div class="main-menu">
    <ul class="menu">
        @foreach($categories as $category)
            <li class="menu__item has-sub-menu">
                <a class="menu__item__link" href="{{ $category->url }}">
                    <i class="{{ MetaBox::getMetaData($category, 'icon', true) }}"></i>
                    <span class="menu__item__link--text font12">
                        {{ $category->name }}
                    </span>
                    @if ($category->children->count() > 0)
                        <span class="menu__item__link--icon"><i class="fal fa-chevron-right"></i></span>
                    @endif
                </a>
                @if ($category->children->count() > 0)
                    <ul class="sub-list">
                        @foreach($category->children as $childCategory)
                            <li class="sub-list__item">
                                <a class="sub-list__link" href="{{ $childCategory->url }}">
                                    <span class="menu__item__link--text font12">
                                        {{ $childCategory->name }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        <li class="menu__item">
            <a class="menu__item__link" href="javascript:void(0);">
                <span class="menu__item__link--text font12">
                    Khuyến mãi
                </span>
                <span class="menu__item__link--icon"><i class="fal fa-chevron-right"></i></span>
            </a>
        </li>
    </ul>
</div>
