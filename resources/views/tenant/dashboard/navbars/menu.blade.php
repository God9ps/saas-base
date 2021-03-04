<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">

    <div class="navbar-container main-menu-content" data-menu="menu-container">

        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item">
                <a class="nav-link" href="{{route('tenant.dashboard', ['subdomain' => request()->subdomain])}}">
                    <i class="feather icon-home"></i>
                    <span data-i18n="nav.dash.main">Dashboard</span>
                </a>
            </li>

            @if(auth()->user()->isadmin())
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-settings"></i><span data-i18n="Pages">Settings</span></a>
                    <ul class="dropdown-menu">

                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#" data-i18n="Users" data-toggle="dropdown">Users</a>
                            <ul class="dropdown-menu">
                                <li data-menu=""><a class="dropdown-item" href="{{route('tenant.users.list', ['subdomain' => request()->subdomain])}}" data-i18n="Users List" data-toggle="dropdown">Users List</a>
                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
            @endif

        </ul>
    </div>

</div>
