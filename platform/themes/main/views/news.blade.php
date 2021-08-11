<div class="page-content">
    <div class="news-wrapper pt-15">
        <div class="container">
            <section class="hot-post box-shadown-sm mb-15 pt-15">
                <div class="feature-posts">
                    @include('theme.main::views.templates.news.feature-posts', ['posts' => @$features])
                </div>
                <div class="population-posts">
                    @include('theme.main::views.templates.news.population-posts', ['posts' => @$populations])
                </div>
            </section>

            <section class="list-posts box-shadown-sm mb-15">
                @include('theme.main::views.templates.news.list-posts', ['posts' => @$posts])
            </section>
        </div>
    </div>
</div>
