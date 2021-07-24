<div class="hot__sale">
    <div class="hot__sale__title">
        <div class="hot__sale__title--content falsh-title">
            <span class="text gradient-title font20">Hot</span>
            <span class="flash-gif">
                <img alt="Falsh Gif" class="img-fluid" src="{{ Theme::asset()->url('images/flash.gif') }}">
            </span>
            <span class="text gradient-title font20">Sale</span>
        </div>
        <div class="hot__sale__title--countdown">
            <div id="countdown">
                <ul class="countdown">
                    <li class="countdown__item">
                        <span class="font14">Kết thúc sau</span>
                    </li>
                    <li class="countdown__item">
                        <span class="countdown__item--span" id="days">00</span> :
                    </li>
                    <li class="countdown__item">
                        <span class="countdown__item--span" id="hours">00</span> :
                    </li>
                    <li class="countdown__item">
                        <span class="countdown__item--span" id="minutes">00</span> :
                    </li>
                    <li class="countdown__item">
                        <span class="countdown__item--span" id="seconds">00</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="hot__sale__content">
        <div class="product__silde">
            <div class="swiper-container product__silde__container">
                <div class="swiper-wrapper product__silde__wrapper">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="swiper-slide product__silde__item">
                            <div class="product__silde__item__image">
                                <a href="javascript:void(0);">
                                    <img class="img-fluid w-100" alt="Product" src="{{ Theme::asset()->url("images/ss.jpg") }}">
                                </a>
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
