<ul class="breadcrumb box-shadown-sm mb-15">
    @foreach (Theme::breadcrumb()->getCrumbs() as $i => $crumb)
        @if ($i != (count(Theme::breadcrumb()->getCrumbs()) - 1))
            <li class="font12"><a href="{{ $crumb['url'] }}">{!! $crumb['label'] !!}</a><span class="divider">/</span></li>
        @else
            <li class="font12" class="active">{!! $crumb['label'] !!}</li>
        @endif
    @endforeach
</ul>
