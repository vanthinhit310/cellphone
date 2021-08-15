<div class="top-ads">
    <ul class="ads">
        @for ($i = 0; $i < 3; $i++)
            <li class="ads__item">
                <a href="javascript:void(0);">
                    <span class="ads__item--image">
                        <img class="img-fluid w-100" alt="ads" src="{{ Theme::asset()->url("images/ads-top.png") }}">
                    </span>
                </a>
            </li>
        @endfor
    </ul>
</div>
