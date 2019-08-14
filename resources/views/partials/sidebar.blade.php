@php
    $sidebar = new \Toolchain\Sidebar();
@endphp

<section class="ui-group">
    @foreach ($sidebar->getNavigationItems() as $item)
        <a href="{{url($item->getUrl())}}" class="ui-btn">@lang($item->getLocale())</a>
    @endforeach
</section>
