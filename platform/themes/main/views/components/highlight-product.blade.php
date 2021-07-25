<div class="product__highlight">
    <div class="product__highlight__title">
        <div class="product__highlight__title--content">
            <h3 class="font16">{!! @$item["title"] !!}</h3>
        </div>
        <div class="product__highlight__title--tags">
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
    <ul class="product__highlight__list">
        @for ($i = 0; $i < 10; $i++)
            <li class="product__highlight__item">
                <div class="product__highlight__item__image">
                    <a href="javascript:void(0);">
                        <img class="img-fluid w-100" alt="Product" src="{{ Theme::asset()->url(@$item["image"]) }}">
                    </a>
                    <div class="product__highlight__item__image--sticker">
                        <div class="percent font12">-{!! @$item["discount"] !!}</div>
                        <div class="flashsale">Hot <br> Sale</div>
                    </div>
                </div>
                <div class="product__highlight__item__box">
                    <a href="javascript:void(0);" class="product__highlight__item__box--name">
                        <h3 class="font14">{!! @$item["name"] !!}</h3>
                    </a>

                    <div class="product__highlight__item__box--price">
                        <p class="price font14">{!! @$item["price"] !!}</p>
                        <p class="strike-price font12">{!! @$item["old_price"] !!}</p>
                    </div>

                    @if ($item["configurations"])
                        <div class="product__highlight__item__box--configuration">
                            <ul>
                                @forelse ($item["configurations"] as $title => $value)
                                    <li><strong>{!! @$title !!}</strong>{!! @$value !!}</li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    @endif

                    @if ($item["promotion"])
                        <div class="product__highlight__item__box--promotion">
                            <p class="gift-cont font12">{!! @$item["promotion"] !!}</p>
                        </div>

                    @endif

                    <div class="product__highlight__item__box--rate">
                        @for ($start = 0; $start < 5; $start++)
                            <i class="fas fa-star  checked"></i>
                        @endfor
                        <span class="text font12">{!! @$item["comments"] !!} đánh giá</span>
                    </div>
                </div>
                <div class="product__highlight__item__action">
                    <a href="javascript:void(0);" class="button red-button buy">Mua ngay</a>
                    <a href="javascript:void(0);" class="button gray-button">So sánh</a>
                </div>
            </li>
        @endfor
    </ul>
</div>
