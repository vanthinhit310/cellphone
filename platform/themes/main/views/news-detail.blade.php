<div class="page-content">
    <div class="news-detail-wrapper pt-15">
        <div class="container">
            <section class="news-bredcrumnb">
                @includeIf('theme.main::views.templates.product.breadcrumb')
            </section>
            <section class="post">
                <h1 class="post__title">{!! @$post->name !!}</h1>
                <p class="post__time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$post->created_at) !!}</p>
                <div class="post-content">
                    <div class="post__left">
                        <p class="post__short-description font16">{!! @$post->description !!}</p>
                        <div class="post__content">
                            {!! @$post->content !!}
                        </div>

                        <div class="post__tags">
                            <ul>
                                <li><strong class="font14">Thẻ:</strong></li>
                                @forelse (@$post->tags as $tag)
                                    <li>
                                        <a>
                                            <span class="font12">{!! @$tag->name !!}</span>
                                        </a>
                                    </li>
                                @empty

                                @endforelse
                            </ul>
                        </div>

                        <div class="related-list">
                            <div class="news-section-title">
                                <span>Bài viết liên quan</span>
                            </div>
                            <div class="post__related">
                                @forelse (@$relateds as $item)
                                    <div class="post__related__item">
                                        <a href="{{ @$item->url }}" class="post__related__item--img">
                                            <img alt="{{ @$item->name }}" class="img-fluid w-100" src="{{ get_post_image(@$item->image, 'small') }}"/>
                                        </a>
                                        <h3 class="font16 post__related__item--title">
                                            <a href="{{ @$item->url }}">{!! limit_text(@$item->name, 70) !!}</a>
                                        </h3>
                                        <p class="post__related__item--time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$item->created_at) !!}</p>
                                        <p class="post__related__item--caption font14">{!! limit_text(@$item->description, 100) !!}</p>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="post__right">
                        <div class="recents">
                            <div class="news-section-title">
                                <span>Bài viết mới cập nhật</span>
                            </div>
                            <div class="recents__list">
                                @forelse (@$recents as $item)
                                    <div class="recents__item">
                                        <div class="recents__item--content">
                                            <h3 class="font14 recents__item--title">
                                                <a href="{{ @$item->url }}">
                                                    {!! limit_text(@$item->name, 70) !!}
                                                </a>
                                            </h3>
                                            <p class="recents__item--time font12"><i class="fal fa-clock"></i> {!! get_time_ago(@$item->created_at) !!}</p>
                                        </div>
                                        <a class="recents__item--img" href="{{ @$item->url }}">
                                            <img alt="{{ @$item->name }}" class="img-fluid w-100" src="{{ get_post_image(@$item->image, 'small') }}">
                                        </a>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
