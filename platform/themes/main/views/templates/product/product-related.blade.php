<div class="p__related">
    <div class="p__related__title">
        <div class="p__related__title--content">
            <h3 class="font16">Sản phẩm liên quan</h3>
        </div>
    </div>
    <div class="p__related__content">
        <div class="product__silde">
            <div class="swiper-container product__silde__container">
                <div class="swiper-wrapper product__silde__wrapper">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="swiper-slide product__silde__item">
                            <div class="product__silde__item__image">
                                <a href="javascript:void(0);">
                                    <img class="img-fluid w-100" alt="Product" src="{{ Theme::asset()->url("images/ss.jpg") }}">
                                </a>
                                <div class="product__silde__item__image--sticker">
                                    <div class="percent font12">-10%</div>
                                    <div class="flashsale">Hot <br> Sale</div>
                                </div>
                            </div>
                            <div class="product__silde__item__box">
                                <a href="javascript:void(0);" class="product__silde__item__box--name">
                                    <h3 class="font14">Samsung Galaxy S21 Plus 5G</h3>
                                </a>

                                <div class="product__silde__item__box--price">
                                    <p class="price font14">16.300.000 ₫</p>
                                    <p class="strike-price font12">25.900.000 ₫</p>
                                </div>

                                <div class="product__silde__item__box--rate">
                                    @for ($start = 0; $start < 5; $start++)
                                        <i class="fas fa-star  checked"></i>
                                    @endfor
                                    <span class="text font12">47 đánh giá</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="product__silde__button swiper-button-next"></div>
                <div class="product__silde__button swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
