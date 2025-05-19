<div class="">
    <!-- Navbar Icons -->
    <ul class="quick-access">
        <li class="dropdown rbt-user-wrapper d-none d-xl-block position-relative">
            <a href="#" class="rbt-btn-link text-capitalize {{$color}}"
               data-bs-toggle="dropdown" aria-expanded="false">
               <i class="feather-user"></i>{{ Auth::user()->role }}
            </a>
            <div class="dropdown-menu dropdown-menu-end rbt-user-menu-list-wrapper">
                <div class="inner">
                    <div class="rbt-admin-profile">
                        <div class="admin-thumbnail">
                            <img src="{{ asset('/assets/img/undraw_profile_1.svg')}}" alt="User Images">
                        </div>
                        <div class="admin-info">
                            <span class="name ">{{Auth::user()->name}}</span>
                            <a class="rbt-btn-link color-primary" href="{{ $profileRoute }}">Ver Perfil</a>
                        </div>
                    </div>
                    <ul class="user-list-wrapper">
                        <li>
                            <a href="instructor-settings.html">
                                <i class="feather-settings"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <!-- Mobile Dropdown (continua como antes) -->
        <li class="dropdown access-icon rbt-user-wrapper d-block d-xl-none">
            <a class="{{$color}} rbt-round-btn" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="feather-user"></i>
            </a>
            <div class="dropdown-menu rbt-user-menu-list-wrapper">
                <div class="inner">
                    <div class="rbt-admin-profile">
                        <div class="admin-thumbnail">
                            <img src="{{ asset('/assets/img/undraw_profile_1.svg')}}" alt="User Images">
                        </div>
                        <div class="admin-info">
                            <span class="name ">{{Auth::user()->name}}</span>
                            <a class="rbt-btn-link color-primary" href="{{ $profileRoute }}">Ver Perfil</a>
                        </div>
                    </div>
                    <ul class="user-list-wrapper">
                        <li>
                            <a href="instructor-settings.html">
                                <i class="feather-settings"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="feather-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
                            <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="feather-log-out"></i>
                                <span>Logout</span>
                            </a>
</div>