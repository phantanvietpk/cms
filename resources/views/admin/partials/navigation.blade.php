<aside class="left-panel">
    <!-- brand -->
    <div class="logo">
        <a href="/admin" class="logo-expanded">
            <i class="fa fa-rocket"></i>
            <span class="nav-label">DashBoard</span>
        </a>
    </div>
    <!-- / brand -->

    <!-- Navbar Start -->
    <nav class="navigation">
        <ul class="list-unstyled">
            @foreach($navigation as $item)
                @php
                    $listClass = [];
                    if ($item->children()) {
                        $listClass[] = 'has-submenu';
                    }
                    if (str_contains(app('navigation')->getCurrentItem(), $item->name())) {
                        $listClass[] = 'active';
                    }
                @endphp
                @can($item->permission())
                <li{!! count($listClass) ? ' class="'.implode(' ', $listClass).'"' : '' !!}>
                    <a href="{{ $item->url() }}" title="{{ $item->title() }}">
                        @if($item->icon()) <i class="{{ $item->icon() }}"></i> @endif
                        <span class="nav-label">{{ $item->title() }}</span>
                    </a>
                    @if($item->children())
                        <ul class="list-unstyled">
                            @foreach($item->children() as $child)
                                @php
                                $class = null;
                                if (str_contains(app('navigation')->getCurrentItem(), $child->name())) {
                                    $class = 'active';
                                }
                                @endphp
                                @can($child->permission())
                                <li{!! $class ? ' class="'.$class.'"' : '' !!}><a href="{{ $child->url() }}">{{ $child->title() }}</a></li>
                                @endcan
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endcan
            @endforeach
        </ul>
    </nav>
</aside>
