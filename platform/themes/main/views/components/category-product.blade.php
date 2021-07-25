<div class="category">
    <div class="category__title">
        <div class="category__title--content">
            <h3 class="font16">Laptop</h3>
        </div>
        <div class="category__title--tags">
            <ul class="tags">
                @for ($tag = 0; $tag < 4; $tag++)
                    <li class="tags__item">
                        <a href="javascript:void(0);" class="tags__item__href">
                            <span class="font12">Apple</span>
                        </a>
                    </li>
                @endfor
                <li class="tags__item">
                    <a href="javascript:void(0);" class="tags__item__href">
                        <span class="font12">Xem tất cả</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="category__content">
        <div class="category__silde">
            <div class="swiper-container category__silde__container">
                <div class="swiper-wrapper category__silde__wrapper">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="swiper-slide category__silde__item">
                            <div class="category__silde__item__image">
                                <a href="javascript:void(0);">
                                    <img class="img-fluid w-100" alt="Product" src="{{ Theme::asset()->url("images/mac.jpg") }}">
                                </a>
                                <div class="category__silde__item__image--sticker">
                                    <div class="percent font12">-10%</div>
                                    <div class="flashsale">Hot <br> Sale</div>
                                </div>
                            </div>
                            <div class="category__silde__item__box">
                                <a href="javascript:void(0);" class="category__silde__item__box--name">
                                    <h3 class="font14">Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam </h3>
                                </a>

                                <div class="category__silde__item__box--price">
                                    <p class="price font14">25.190.000 ₫</p>
                                    <p class="strike-price font12">27.990.000 ₫</p>
                                </div>

                                <div class="category__silde__item__box--configuration">
                                    <ul>
                                        <li><strong>CPU: </strong>8 nhân với 4 nhân hiệu năng cao và 4 nhân tiết kiệm điện</li>
                                        <li><strong>Màn hình:</strong>13.3 inches</li>
                                    </ul>
                                </div>

                                <div class="category__silde__item__box--promotion">
                                    <p class="gift-cont font12">Mua kèm AirTag (hộp 1 chiếc) giá chỉ 590k (tối đa 3 sản phẩm/máy)</p>
                                </div>

                                <div class="category__silde__item__box--rate">
                                    @for ($start = 0; $start < 5; $start++)
                                        <i class="fas fa-star  checked"></i>
                                    @endfor
                                    <span class="text font12">47 đánh giá</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="category__silde__button swiper-button-next"></div>
                <div class="category__silde__button swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
