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
            <div id="countdown" data-countdown="2022-08-02 00:00"></div>
        </div>
    </div>
    <div class="hot__sale__content">
        <div class="product__silde">
            <div class="swiper-container product__silde__container">
                <div class="swiper-wrapper product__silde__wrapper">
                    @if ($productHot->count() > 0)
                        @foreach($productHot as $product)
                            <div class="swiper-slide">
                                <div class="product__silde__item">
                                    <div class="product__silde__item__image">
                                        <a href="{{ $product->url }}">
                                            <img class="img-fluid w-100" alt="{{ $product->name }}" src="{{ RvMedia::getImageUrl($product->image, 'product', false, RvMedia::getDefaultImage()) }}">
                                        </a>
                                        @if ($product->front_sale_price !== $product->price)
                                            <div class="product__silde__item__image--sticker">
                                                <div class="percent font12">{{ get_sale_percentage($product->price, $product->front_sale_price) }}</div>
                                                <div class="flashsale">Hot <br> Sale</div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product__silde__item__box">
                                        <a href="{{ $product->url }}" class="product__silde__item__box--name">
                                            <h3 class="font14">{{ $product->name }}</h3>
                                        </a>

                                        <div class="product__silde__item__box--price">
                                            <p class="price font14">{{ format_price($product->front_sale_price_with_taxes) }}</p>
                                            @if ($product->front_sale_price !== $product->price)
                                                <p class="strike-price font12">{{ format_price($product->price_with_taxes) }}</p>
                                            @endif
                                        </div>
                                        @if (EcommerceHelper::isReviewEnabled())
                                            @php $countRating = get_count_reviewed_of_product($product->id) @endphp
                                            @php $countStart = get_average_star_of_product($product->id) @endphp
                                            @if ($countRating > 0)
                                                <div class="product__silde__item__box--rate">
                                                    @for ($start = 1; $start <= 5; $start++)
                                                        <i class="fas fa-star  @if($start <= $countStart) checked @endif"></i>
                                                    @endfor
                                                    <span class="text font12">{{$countRating}} đánh giá</span>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="product__silde__button swiper-button-next"></div>
                <div class="product__silde__button swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
