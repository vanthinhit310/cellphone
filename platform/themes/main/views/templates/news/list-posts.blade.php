<div class="posts">
    <div class="news-section-title">
        <span>Bài viết mới nhất</span>
    </div>
    <div class="posts__list">
        @forelse ($posts as $item)
            <div class="posts__item">
                <a href="{{ @$item->url }}" class="posts__item--img">
                    <img alt="{{ @$item->name }}" class="img-fluid w-100" src="{{ get_post_image(@$item->image, 'small') }}"/>
                </a>
                <h3 class="font16 posts__item--title">
                    <a href="{{ @$item->url }}">{!! limit_text(@$item->name, 70) !!}</a>
                </h3>
                <p class="posts__item--time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$item->created_at) !!}</p>
                <p class="posts__item--caption font14">{!! limit_text(@$item->description, 100) !!}</p>
            </div>
        @empty

        @endforelse
    </div>
    {!! @$posts->links() !!}
</div>
