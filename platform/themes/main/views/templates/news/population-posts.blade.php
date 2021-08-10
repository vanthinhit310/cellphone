<div class="population">
    <div class="news-section-title">
        <span>Bài viết được xem nhiều</span>
    </div>
    <div class="population__list">
        @for ($i = 0; $i <6 ; $i++)
            <div class="population__item">
                <div class="population__item--content">
                    <h3 class="font14 population__item--title">
                        <a href="javascript:void(0);">
                            Cận cảnh Motorola Edge S Pro: Smartphone “phá đảo” phân khúc dưới 9 triệu đồng
                        </a>
                    </h3>
                    <p class="population__item--time font12"><i class="fal fa-clock"></i> 2 day agos</p>
                </div>
                <a class="population__item--img" href="javascript:void(0);">
                    <img alt="News" class="img-fluid w-100" src="{{ Theme::asset()->url("images/population.jpg") }}">
                </a>
            </div>
        @endfor
    </div>
</div>
