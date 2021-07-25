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
                @includeIf('theme.main::views.components.product-brand')
            </section>

            @php
                $laptop = [
	                "title" => "Laptop",
                	"image" => "images/mac.jpg",
                	"name" => "Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam",
                	"discount" => "5%",
                	"price" => "25.190.000 ₫",
                	"old_price" => "27.990.000 ₫",
                	"comments" => 30,
                	"promotion" => "Mua kèm AirTag (hộp 1 chiếc) giá chỉ 590k (tối đa 3 sản phẩm/máy)",
                	"configurations" => [
                        "CPU:" => "8 nhân với 4 nhân hiệu năng cao và 4 nhân tiết kiệm điện",
                        "Màn hình:" => "13.3 inches",
                    ],
                    "tags" => ["Apple", "Samsung", "HP", "DELL", "Lenovo", "Asus", "Acer"]
                ];
            @endphp

            <section class="category-product box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.category-product', ['item' => $laptop])
            </section>

            @php
                $monitor = [
	                "title" => "MÀN HÌNH, MÁY TÍNH ĐỂ BÀN",
                	"image" => "images/monitor.jpg",
                	"name" => "Màn hình thông minh Samsung 27 inch LS27AM500NEXXV",
                	"discount" => "15%",
                	"price" => "8.590.000 ₫",
                	"old_price" => "17.090.000 ₫",
                	"comments" => 20,
                	"promotion" => "Tặng bàn phím Bluetooth Logitech K580 Trắng và 1 km khác",
                	"configurations" => [],
                	"tags" => ["Apple", "Samsung", "LG", "HP", "DELL", "Asus", "Acer"]
                ];
            @endphp

            <section class="category-product box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.category-product', ['item' => $monitor])
            </section>
        </div>
    </div>
</div>
