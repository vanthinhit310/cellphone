<div class="feature">
    <div class="news-section-title">
        <span>Bài viết nổi bật</span>
    </div>
    <div class="feature__list">
        <a href="{{ @$posts[0]->url }}" class="feature__highlight" style="background-image: url({{ get_post_image(@$posts[0]->image, 'large') }})">
            <span class="feature__highlight__content">
                <span class="feature__highlight__category font12">{!! @$posts[0]->categories[0]->name !!}</span>
                <span class="feature__highlight__title font20">{!! @$posts[0]->name !!}</span>
                <span class="feature__highlight__time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$posts[0]->created_at) !!}</span>
            </span>
        </a>

        <div class="feature__slide">
            <div class="swiper-container feature__slide__container">
                <div class="swiper-wrapper feature__slide__wp">
                    @forelse ($posts as $index => $item)
                        @if ($index > 0)
                            <div class="swiper-slide">
                                <div class="feature__slide__item">
                                    <a class="feature__slide__item--img" href="{{ @$item->url }}">
                                        <img class="img-fluid w-100" src="{{ get_post_image(@$item->image, 'small') }}" alt="{{ @$item->name }}"/>
                                    </a>
                                    <a class="feature__slide__item--title" href="{{ @$item->url }}">
                                        <h3 class="font14">{!! limit_text(@$item->name, 70) !!}</h3>
                                    </a>
                                    <p class="feature__slide__item--time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$item->created_at) !!}</p>
                                </div>
                            </div>
                        @endif
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
