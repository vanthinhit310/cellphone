<div class="feature">
    <div class="feature__list">
        <div class="feature__highlight" style="background-image: url({{ Theme::asset()->url("images/highlight.jpg") }})">
            <div class="feature__highlight__content">
                <p class="feature__highlight__category font14">Movie</p>
                <a class="feature__highlight__title font20">Mời bạn đọc tải về bộ hình nền phi hành gia siêu dễ thương dành cho iPhone (Phần 2)</a>
                <p class="feature__highlight__time font12"><i class="fal fa-clock"></i> 2 day agos</p>
            </div>
        </div>

        <div class="feature__slide">
            <div class="swiper-container feature__slide__container">
                <div class="swiper-wrapper feature__slide__wp">
                    @for ($i = 0; $i < 6; $i++)
                        <div class="swiper-slide">
                            <div class="feature__slide__item">
                                <a class="feature__slide__item--img" href="javascript:void(0);">
                                    <img class="img-fluid w-100" src="{{ Theme::asset()->url("images/feature.jpg") }}" alt="News"/>
                                </a>
                                <a class="feature__slide__item--title" href="javascript:void(0);">
                                    <h3 class="font16">Cận cảnh ZTE Axon 30 5G: Smartphone trang bị công nghệ camera ẩn dưới màn hình thế hệ 2</h3>
                                </a>
                                <p class="feature__slide__item--time font12"><i class="fal fa-clock"></i> 2 day agos</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
