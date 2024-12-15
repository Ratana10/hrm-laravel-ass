<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="./generate/theme.html" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"> <i
                class="nav-icon bi bi-palette"></i>
            <p>{{ __('Dashboard') }}</p>
        </a>
    </li>
    <li
        class="nav-item {{ request()->routeIs('company.index') || request()->routeIs('user.index') || request()->routeIs('exchange_rate.index') || request()->routeIs('payment_method.index') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
                {{ __('Setting') }}
                <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('company.index') }}"
                    class="nav-link {{ request()->routeIs('company.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Company') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.index') }}"
                    class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('User') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('exchange_rate.index') }}"
                    class="nav-link {{ request()->routeIs('exchange_rate.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Exchange Rate') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payment_method.index') }}"
                    class="nav-link {{ request()->routeIs('payment_method.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Payment Method') }}</p>
                </a>
            </li>
        </ul>
    </li>


</ul> <!--end::Sidebar Menu-->
