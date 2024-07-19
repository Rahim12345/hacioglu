<!-- Sidebar wrapper start -->
<nav class="sidebar-wrapper">

    <!-- Sidebar brand starts -->
    <div class="brand"
         style="    display: flex;
    align-items: center;
    justify-content: center;"
    >
        <a href="{{ config('app.url') }}" class="logo">
            {{--            <img src="{{ asset('back/assets/images/logo.svg') }}" class="d-none d-md-block me-4" alt=""/>--}}
            {{--            <img src="{{ asset('back/assets/images/logo-sm.svg') }}" class="d-block d-md-none me-4"--}}
            {{--                 alt=""/>--}}
            <b
                style="color: #fff;
    font-size: 25px;"
            >{{ config('app.name') }}</b>
        </a>
    </div>
    <!-- Sidebar brand ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebar-menu">
        <div class="sidebarMenuScroll">
            <ul>
                <li class="{{ request()->segment(2) == 'home' ? 'active-page-link' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="bi bi-house"></i>
                        <span class="menu-text">Əsas səhifə</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'pairs' ? 'active-page-link' : '' }}">
                    <a href="{{ route('pairs.index') }}">
                        <i class="bi bi-mask"></i>
                        <span class="menu-text">Əvvəl-Sonra</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'portfolio' ? 'active-page-link' : '' }}">
                    <a href="{{ route('portfolio.create') }}">
                        <i class="bi bi-briefcase-fill"></i>
                        <span class="menu-text">İşlərimiz</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'review' ? 'active-page-link' : '' }}">
                    <a href="{{ route('review.create') }}">
                        <i class="bi bi-megaphone-fill"></i>
                        <span class="menu-text">Rəylər</span>
                    </a>
                </li>
                <li class="{{ request()->segment(2) == 'service' ? 'active-page-link' : '' }}">
                    <a href="{{ route('service.create') }}">
                        <i class="bi bi-person-video2"></i>
                        <span class="menu-text">Xidmətlər</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar menu ends -->
</nav>
<!-- Sidebar wrapper end -->
