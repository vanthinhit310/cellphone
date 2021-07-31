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
                $highlight = [
	                "title" => "Điện thoại nổi bật nhất",
                	"image" => "images/note20.jpg",
                	"name" => "Samsung Galaxy Note 20 Ultra 5G",
                	"discount" => "39%",
                	"price" => "19.990.000 ₫",
                	"old_price" => "32.990.000 ₫",
                	"comments" => 16,
                	"promotion" => "Thu cũ lên đời trợ giá 1 triệu",
                	"configurations" => [],
                	"tags" => ["Apple", "Samsung", "Xiaomi","OPPO", "Nokia", "Realme", "Vsmart", "ASUS", "Vivo"]
                ];
            @endphp

            <section class="category-product box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.highlight-product', ['item' => $highlight])
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

            @php
                $tablet = [
	                "title" => "Tablet",
                	"image" => "images/tab7.jpg",
                	"name" => "Samsung Galaxy Tab S7",
                	"discount" => "18%",
                	"price" => "15.400.000 ₫",
                	"old_price" => "18.990.000 ₫",
                	"comments" => 6,
                	"promotion" => "Bao da kiêm bàn phím chính hãng Samsung Galaxy Tab S7 trị giá 4 triệu",
                	"configurations" => [],
                	"tags" => ["iPad", "Samsung", "Lenovo","Máy đọc sách"]
                ];
            @endphp

            <section class="category-product box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.category-product', ['item' => $tablet])
            </section>

            @php
                $bluetooth = [
	                "title" => "Âm thanh",
                	"image" => "images/bl.jpg",
                	"name" => "Tai nghe Bluetooth Apple AirPods 2 VN/A",
                	"discount" => "16%",
                	"price" => "3.350.000 ₫",
                	"old_price" => "3.990.000 ₫",
                	"comments" => 28,
                	"promotion" => "Giảm thêm 300.000đ khi mùa kèm Apple Watch Series 6 và 1 km khác",
                	"configurations" => [],
                	"tags" => ["Load Bluetooth", "Loa Tivi|Soundbar", "Tai nghe","Tai nghe chụp tai"]
                ];
            @endphp

            <section class="category-product box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.category-product', ['item' => $bluetooth])
            </section>

            <section class="category-box box-shadown-sm mb-15">
                @includeIf('theme.main::views.components.category-box')
            </section>
        </div>
    </div>
</div>
