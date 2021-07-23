<div class="banner__slide ">
    <div class="swiper-container banner__slide__top">
        <div class="swiper-wrapper banner__slide__top__wrapper">
            @for ($i = 0; $i < 6; $i++)
                <div class="swiper-slide banner__slide__top__item">
                    <img class="img-fluid w-100" src="{{ Theme::asset()->url("images/banner.png") }}" alt="banner"/>
                </div>
            @endfor
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div thumbsSlider="" class="swiper-container banner__slide__thumb">
        <div class="swiper-wrapper banner__slide__thumb__wrapper">
            @for ($i = 0; $i < 6; $i++)
                <div class="swiper-slide banner__slide__thumb__item">
                    <span class="banner__slide__thumb__item--title font14">Galaxy S20 FE</span>
                    <span class="banner__slide__thumb__item--description font12">Hotsale giảm khủng</span>
                </div>
            @endfor
        </div>
    </div>
</div>
