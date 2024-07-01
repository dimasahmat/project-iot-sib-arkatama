<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">
    <div class="app-brand demo ">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner">
        <li class="menu-item @if (request()->url() == route('dashboard')) active @endif">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item @if (request()->url() == route('log')) active @endif">
            <a href="{{ route('log') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-history"></i>
                <div data-i18n="Log">Log</div>
            </a>
        </li>
        <li class="menu-item
        @if (request()->url() == route('users.index')) active @endif">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-account-circle-outline"></i>
                <div data-i18n="Dashboard">User</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('logout') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-logout"></i>
                <div data-i18n="Dashboard">Logout</div>
            </a>
        </li>
    </ul>
</aside>
