@php
    $sidebar = new \Toolchain\Sidebar();
@endphp

<section class="ui-group">
    @foreach ($sidebar->getNavigationItems() as $item)

        <a href="{{url($item->getUrl())}}" class="ui-btn">
            <div class="sidebar-icon">
                <img src="{{$item->getIcon()}}" alt="icon" class="sidebar-icon"/>
            </div>
            @lang($item->getLocale())
        </a>
    @endforeach
</section>
