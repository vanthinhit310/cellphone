<div class="population">
    <div class="news-section-title">
        <span>Bài viết được xem nhiều</span>
    </div>
    <div class="population__list">
        @forelse ($posts as $item)
            <div class="population__item">
                <div class="population__item--content">
                    <h3 class="font14 population__item--title">
                        <a href="{{ @$item->url }}">
                            {!! limit_text(@$item->name, 70) !!}
                        </a>
                    </h3>
                    <p class="population__item--time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$item->created_at) !!}</p>
                </div>
                <a class="population__item--img" href="{{ @$item->url }}">
                    <img alt="{{ @$item->name }}" class="img-fluid w-100" src="{{ get_post_image(@$item->image, 'small') }}">
                </a>
            </div>
        @empty

        @endforelse
    </div>
</div>
