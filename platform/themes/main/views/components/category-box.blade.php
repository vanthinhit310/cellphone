<div class="category__box">
    <div class="category__box__title">
        <div class="category__box__title--content">
            <h3 class="font16">Danh mục phụ kiện</h3>
        </div>
        <div class="category__box__title--tags">
            <ul class="tags">
                <li class="tags__item">
                    <a href="javascript:void(0);" class="tags__item__href">
                        <span class="font12">Xem tất cả</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="category__box__content">
        <div class="category__box__list">
            @for ($i = 0; $i < 15; $i++)
                <div class="category__box__item">
                    <a href="javascript:void(0);">
                        <span class="image">
                            <img class="img-fluid w-100" src="{{ Theme::asset()->url('images/pkimage.png') }}" alt="Category">
                        </span>
                        <span class="text font12">Thiết bị mạng</span>
                    </a>
                </div>
            @endfor
            <div class="category__box__item">
                <a href="javascript:void(0);">
                    <span class="image">
                        <img class="img-fluid w-100" src="{{ Theme::asset()->url('images/dot.png') }}" alt="All Category">
                    </span>
                    <span class="text font12">Xem tất cả</span>
                </a>
            </div>
        </div>
    </div>
</div>
