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
            <section class="home-promotion mb-15">
                <a href="javascript:void(0);">
                    <img class="img-fluid w-100" src="{{ Theme::asset()->url('images/cv1200x75.png') }}" alt="Promotion">
                </a>
            </section>
            <section class="home__sale box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.hot-sale-product', ['some' => 'data'])
            </section>
            <section class="home__sale box-shadown-sm mb-15 ">
                @includeIf('theme.main::views.components.hot-sale-accessory', ['some' => 'data'])
            </section>
            <section class="brands mb-15">
                @includeIf('theme.main::views.components.product-brand', ['some' => 'data'])
            </section>

            <section class="category-product box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.category-product', ['some' => 'data'])
            </section>
        </div>
    </div>
</div>
