<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img src="{{asset('admin/logo/logo.png')}}" alt="" style="height: 55px; width: 100px;">
      {{-- <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#full"></use>
      </svg> --}}
      <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
        <use xlink:href="assets/brand/coreui.svg#signet"></use>
      </svg>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin.dashboard*') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                <svg class="nav-icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                </svg> Dashboard
            </a>
        </li>

        <ul class="nav-group-items">
            <li class="nav-item" >
                <a class="nav-link {{ request()->is('banner-list*') ? 'active' : '' }}" href="{{route('banner-list')}}"><span class="nav-icon"></span>
                    <i class="fas fa-image" style="margin-left: -43px; margin-right: 24px;"></i>  Banner Management
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('card-list*') ? 'active' : '' }}" href="{{route('card-list')}}"><span class="nav-icon"></span>
                    <i class="fa-regular fa-credit-card" style="margin-left: -43px; margin-right: 24px;"></i> Card Management
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('about-coin-list*') ? 'active' : '' }}" href="{{route('about-coin-list')}}"><span class="nav-icon"></span>
                    <i class="fa-solid fa-address-card" style="margin-left: -43px; margin-right: 24px;"></i> About Coins
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('cms-list*') ? 'active' : '' }}" href="{{route('cms-list')}}"><span class="nav-icon"></span>
                    <i class="fa-regular fa-file" style="margin-left: -43px; margin-right: 24px;"></i> CMS Management
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('healthmanage-list*') ? 'active' : '' }}" href="{{route('healthmanage-list')}}"><span class="nav-icon"></span>
                    <i class="fa-solid fa-star-of-life" style="margin-left: -43px; margin-right: 24px;"></i> Health Management
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('empower-list*') ? 'active' : '' }}" href="{{route('empower-list')}}"><span class="nav-icon"></span>
                    <i class="fa-solid fa-power-off" style="margin-left: -43px; margin-right: 24px;"></i> Empower Management
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('testimonial-list*') ? 'active' : '' }}" href="{{route('testimonial-list')}}"><span class="nav-icon"></span>
                    <i class="fa-solid fa-users" style="margin-left: -43px; margin-right: 24px;"></i> Testimonial Management
                </a>
            </li>
        </ul>

        <ul class="nav-group-items">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('contact-list*') ? 'active' : '' }}" href="{{route('contact-list')}}"><span class="nav-icon"></span>
                    <i class="fa-solid fa-user" style="margin-left: -43px; margin-right: 24px;"></i> Enquery Contact
                </a>
            </li>
        </ul>
    
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
  </div>