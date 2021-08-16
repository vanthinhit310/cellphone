@if (count($sliders) > 0)
    <div class="banner__slide ">
        <div class="swiper-container banner__slide__top">
            <div class="swiper-wrapper banner__slide__top__wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide banner__slide__top__item">
                        <img class="img-fluid w-100" src="{{ RvMedia::getImageUrl($slider->image, 'slider', false, RvMedia::getDefaultImage()) }}" alt="banner"/>
                    </div>
                @endforeach
            </div>
            <div class="banner__slide__top__button swiper-button-next"></div>
            <div class="banner__slide__top__button swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper-container banner__slide__thumb">
            <div class="swiper-wrapper banner__slide__thumb__wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide banner__slide__thumb__item">
                        @if ($slider->title)
                            <span class="banner__slide__thumb__item--title font14">{{ $slider->title }}</span>
                        @endif
                        @if ($slider->description)
                            <span class="banner__slide__thumb__item--description font12">{{ $slider->description }}</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
