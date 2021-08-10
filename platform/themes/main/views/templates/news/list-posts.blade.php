<div class="posts">
    <div class="posts__list">
        @for ($i = 0; $i < 9; $i++)
            <div class="posts__item">
                <a class="posts__item--img">
                    <img alt="News" class="img-fluid w-100" src="{{ Theme::asset()->url("images/news_item.jpg") }}"/>
                </a>
                <h3 class="font16 posts__item--title">
                    <a href="javascript:void(0);">Cận cảnh Motorola Edge S Pro: Smartphone “phá đảo” phân khúc dưới 9 triệu đồng</a>
                </h3>
                <p class="posts__item--time font12"><i class="fal fa-clock"></i> 2 day agos</p>
                <p class="posts__item--caption font14">ASUS đã công bố ROG Phone 3 vào nửa đầu năm 2020. Trong nửa cuối năm, hãng đã trình làng...</p>
            </div>
        @endfor
    </div>
</div>
