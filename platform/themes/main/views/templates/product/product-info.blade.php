<div class="product__info">
    <div class="product__info__left">
        <div class="product__info__slide">
            <div class="swiper-container ps__container__top">
                <div class="swiper-wrapper ps__container__top__wp">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="swiper-slide ps__container__top__item">
                            <div><img id="product-image-{{ $i }}" class="img-fluid w-100" data-zoom-image="{!! Theme::asset()->url('images/product.jpg') !!}" src="{!! Theme::asset()->url('images/product.jpg') !!}" alt="Product Image"/></div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="swiper-container ps__container__thumb">
                <div class="swiper-wrapper ps__container__thumb__wp">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="swiper-slide ps__container__thumb__item">
                            <div class="thumb-img">
                                <img class="img-fluid product_image w-100" src="{!! Theme::asset()->url('images/product.jpg') !!}" alt="Product Image"/>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="ps__container__button swiper-button-next"></div>
                <div class="ps__container__button swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <div class="product__info__right">
        <div class="info">
            <h1 class="info__title">Samsung Galaxy Note 20 Ultra 5G</h1>
            <div class="info__rate">
                <ul class="rate">
                    <li class="start">
                        <span class="font16 number-text">5</span>
                        @for ($start = 0; $start < 5; $start++) <i class="fas fa-star  checked"></i>
                        @endfor
                    </li>
                    <li class="rate">
                        <span class="font16 number-text">50</span>
                        <span class="text font14">Đánh giá</span>
                    </li>
                    <li class="sale">
                        <span class="font16 number-text">140</span>
                        <span class="text font14">Đã bán</span>
                    </li>
                </ul>
            </div>

            <div class="info__description">
                <p class="font16">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <div class="info__price">
                <ul class="price box-shadown-sm">
                    <li class="price">
                        <span>25.900.000 ₫</span>
                    </li>

                    <li class="old-price">
                        <span>16.300.000 ₫</span>
                    </li>

                    <li class="discount">
                        <span class="font12"> -10%</span>
                    </li>
                </ul>
            </div>
            <div class="product-attr color">
                <label class="font14">Màu sắc</label>
                <div class="ui fluid selection dropdown">
                    <input type="hidden" name="user">
                    <i class="dropdown icon"></i>
                    <span class="default text">Chọn màu sắc</span>
                    <div class="menu">
                        <div class="item">
                            <div style="background-color: green; border-color: green;" class="ui empty circular label"></div>
                            Red
                        </div>
                        <div class="item">
                            <div style="background-color: green; border-color: green;" class="ui empty circular label"></div>
                            Blue
                        </div>
                        <div class="item">
                            <div style="background-color: green; border-color: green;" class="ui empty circular label"></div>
                            Black
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-attr color">
                <label class="font14">Kích cỡ</label>
                <select name="color" class="ui fluid dropdown">
                    <option value="">Chọn kích cỡ</option>
                    <option value="red">X</option>
                    <option value="red">L</option>
                    <option value="red">M</option>
                </select>
                <a class="view-size-table font12" href="javascript:void(0);">Bảng quy đổi kích cỡ</a>
            </div>
            <div class="product-attr quantity">
                <label class="font14">Số lượng</label>
                <div class="quantity-control">
                    <button type="button" class="minus ui button">
                        <i class="fal fa-minus"></i>
                    </button>
                    <div class="ui input">
                        <input type="text" class="numberQuantity" value="1" step="1" min="1" name="quantity">
                    </div>
                    <button type="button" class="plus ui button">
                        <i class="fal fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="product-action action">
                <a class="action__item ui button red">
                    <span>Mua ngay</span>
                </a>
                <div class="ui animated fade button red-outline" tabindex="0">
                    <div class="hidden content">
                        <i class="fal fa-cart-plus icon"></i>
                    </div>
                    <div class="visible content">
                        <span>Thêm vào giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
