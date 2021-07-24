<div class="content">
    <div class="home-wrapper">
        <div class="container">
            <section class="home__top">
                <div class="home__top__left box-shadown-sm">
                    @include('theme.main::views.templates.home.sections.menu')
                </div>
                <div class="home__top__center box-shadown-sm">
                    @include('theme.main::views.templates.home.sections.banner')
                </div>
                <div class="home__top__right">
                    @include('theme.main::views.templates.home.sections.top-ads')
                </div>
            </section>
            <section class="home-promotion">
                <a href="javascript:void(0);">
                    <img class="img-fluid w-100" src="{{ Theme::asset()->url('images/cv1200x75.png') }}" alt="Promotion">
                </a>
            </section>
            <section class="home__sale">
                @includeIf('theme.main::views.components.hot-sale-product', ['some' => 'data'])
            </section>
        </div>
    </div>
</div>
