<div class="category">
    <div class="category__title">
        <div class="category__title--content">
            <h3 class="font16">{!! @$item["title"] !!}</h3>
        </div>
        <div class="category__title--tags">
            <ul class="tags">
                @forelse ($item["tags"] as $tag)
                    <li class="tags__item">
                        <a href="javascript:void(0);" class="tags__item__href">
                            <span class="font12">{!! @$tag !!}</span>
                        </a>
                    </li>
                @empty

                @endforelse
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
                                    <img class="img-fluid w-100" alt="Product" src="{{ Theme::asset()->url(@$item["image"]) }}">
                                </a>
                                <div class="category__silde__item__image--sticker">
                                    <div class="percent font12">-{!! @$item["discount"] !!}</div>
                                    <div class="flashsale">Hot <br> Sale</div>
                                </div>
                            </div>
                            <div class="category__silde__item__box">
                                <a href="javascript:void(0);" class="category__silde__item__box--name">
                                    <h3 class="font14">{!! @$item["name"] !!}</h3>
                                </a>

                                <div class="category__silde__item__box--price">
                                    <p class="price font14">{!! @$item["price"] !!}</p>
                                    <p class="strike-price font12">{!! @$item["old_price"] !!}</p>
                                </div>

                                @if ($item["configurations"])
                                    <div class="category__silde__item__box--configuration">
                                        <ul>
                                            @forelse ($item["configurations"] as $title => $value)
                                                <li><strong>{!! @$title !!}</strong>{!! @$value !!}</li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif

                                @if ($item["promotion"])
                                    <div class="category__silde__item__box--promotion">
                                        <p class="gift-cont font12">{!! @$item["promotion"] !!}</p>
                                    </div>

                                @endif

                                <div class="category__silde__item__box--rate">
                                    @for ($start = 0; $start < 5; $start++)
                                        <i class="fas fa-star  checked"></i>
                                    @endfor
                                    <span class="text font12">{!! @$item["comments"] !!} đánh giá</span>
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
