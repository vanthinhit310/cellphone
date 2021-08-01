<div class="page-content">
    <div class="product-wrapper">
        <div class="container">
            <section class="product-bredcrumnb">
                @includeIf('theme.main::views.templates.product.breadcrumb')
            </section>
            <section class="box-shadown-sm mb-15 productInfo">
                @includeIf('theme.main::views.templates.product.product-info')
            </section>

            <section class="mb-15 productDescription">
                @includeIf('theme.main::views.templates.product.product-description')
            </section>

            <section class="mb-15 box-shadown-sm productRelated">
                @includeIf('theme.main::views.templates.product.product-related')
            </section>
        </div>
    </div>
</div>
