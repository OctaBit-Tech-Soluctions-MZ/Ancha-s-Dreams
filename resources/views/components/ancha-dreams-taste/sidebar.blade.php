<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu sidebar" style="background:#313a46 !important" id="accordionSidebar">

    <!-- LOGO -->
    <a href="{{route('dashboard')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('admin/images/logo.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin/images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar="">

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navegação</li>
            @if (isset($nav_item))
                {{ $nav_item }}
            @endif
        </ul>
    </div>
</div>