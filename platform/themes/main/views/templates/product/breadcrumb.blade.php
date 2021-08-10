<ul class="breadcrumb mb-15">
    @foreach (Theme::breadcrumb()->getCrumbs() as $i => $crumb)
        @if ($i != (count(Theme::breadcrumb()->getCrumbs()) - 1))
            <li class="font14">
                <a href="{{ $crumb['url'] }}">{!! $crumb['label'] !!}</a>
                <span class="divider"><i class="fal fa-angle-double-right"></i></span>
            </li>
        @else
            <li class="font14 active">{!! $crumb['label'] !!}</li>
        @endif
    @endforeach
</ul>
