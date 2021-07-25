<div class="brand__slide">
    <div class="swiper-container brand__slide__container">
        <div class="swiper-wrapper brand__slide__wrapper">
            @for ($i = 0; $i < 10; $i++)
                <div class="swiper-slide brand__slide__item box-shadown-sm">
                    <a href="javascript:void(0);">
                        <img src="{{ Theme::asset()->url("images/ss_brand.png") }}" class="img-fluid w-100" alt="Brand name">
                    </a>
                </div>
            @endfor
        </div>
    </div>
</div>
