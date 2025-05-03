<li class="side-nav-item">
    <a data-bs-toggle="collapse" href="#sidebar{{$keyname}}" aria-expanded="false" aria-controls="sidebar{{$keyname}}" class="side-nav-link">
        <i class="{{$icon}}"></i>
        <span> {{$keyname}} </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebar{{$keyname}}">
        <ul class="side-nav-second-level">
            {{ $slot }}
        </ul>
    </div>
</li