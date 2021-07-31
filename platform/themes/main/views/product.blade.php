<div class="content">
    <div class="product-wrapper">
        <div class="container">
            <ul class="breadcrumb box-shadown-sm mb-15">
                @foreach (Theme::breadcrumb()->getCrumbs() as $i => $crumb)
                    @if ($i != (count(Theme::breadcrumb()->getCrumbs()) - 1))
                    <li class="font12"><a href="{{ $crumb['url'] }}">{!! $crumb['label'] !!}</a><span class="divider">/</span></li>
                @else
                    <li class="font12" class="active">{!! $crumb['label'] !!}</li>
                @endif
                @endforeach
            </ul>

            <div class="product__info box-shadown-sm mb-15">
                <div class="product__info__left">
                    <div class="product__info__slide">
                        <div class="swiper-container ps__container__top">
                            <div class="swiper-wrapper ps__container__top__wp">
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="swiper-slide ps__container__top__item">
                                        <img class="img-fluid w-100" src="{!! Theme::asset()->url('images/product.jpg') !!}" alt="Product Image" />
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="swiper-container ps__container__thumb">
                            <div class="swiper-wrapper ps__container__thumb__wp">
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="swiper-slide ps__container__thumb__item">
                                        <img class="img-fluid w-100" src="{!! Theme::asset()->url('images/product.jpg') !!}" alt="Product Image" />
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
                                    <span class="font14">5</span>
                                    @for ($start = 0; $start < 5; $start++)
                                        <i class="fas fa-star  checked"></i>
                                    @endfor
                                </li>
                                <li class="rate">
                                    <span class="font14">50 Đánh giá</span>
                                </li>
                                <li class="sale">
                                    <span class="font14">140 Đã bán</span>
                                </li>
                            </ul>
                        </div>

                        <div class="info__description">
                            <p class="font16">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>

                        <div class="info__price">
                            <ul class="price">
                                <li class="old-price">
                                    <span>16.300.000 ₫</span>
                                </li>

                                <li class="price">
                                    <span>25.900.000 ₫</span>
                                </li>

                                <li class="discount">
                                    <span> -10% </span>
                                </li>
                            </ul>
                        </div>
                        <div class="product-attr form-group color">
                            <label class="font14">Màu sắc</label>
                            <select name="color">
                                <option value="red">Red</option>
                                <option value="red">Black</option>
                                <option value="red">Blue</option>
                            </select>
                        </div>
                        <div class="product-attr form-group color">
                            <label class="font14">Kích cỡ</label>
                            <select name="color">
                                <option value="red">X</option>
                                <option value="red">L</option>
                                <option value="red">M</option>
                            </select>
                            <a class="view-size-table font14" href="javascript:void(0);">Bảng quy đổi kích cỡ</a>
                        </div>
                        <div class="product-attr form-group color">
                            <label class="font14">Số lượng</label>
                            <div class="quantity-control" data-quantity="">
                                <button class="minus font14" data-quantity-minus=""><i class="fal fa-minus"></i></button>
                                <input type="number" class="number font14" data-quantity-target="" value="1" step="1" min="1" max="" name="quantity">
                                <button class="plus font14" data-quantity-plus=""><i class="fal fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="product-action action">
                            <a class="action__item"><i class="fal fa-cart-plus"></i> <span>Thêm vào giỏ hàng</span></a>
                            <a class="action__item"><span>Mua ngay</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
