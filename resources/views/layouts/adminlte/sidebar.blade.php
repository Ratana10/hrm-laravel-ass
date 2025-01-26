<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"> <i
                class="nav-icon bi bi-palette"></i>
            <p>{{ __('Dashboard') }}</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('invoice.index') }}"
            class="nav-link {{ request()->routeIs('invoice.index') || request()->routeIs('invoice.add') || request()->routeIs('invoice.edit') ? 'active' : '' }}">
            <i class="nav-icon bi bi-receipt"></i>
            <p>{{ __('Invoice') }}</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('open_room.list_room') }}"
            class="nav-link {{ request()->routeIs('open_room.list_room') || request()->routeIs('open_room.add') || request()->routeIs('open_room.edit') ? 'active' : '' }}">
            <i class="nav-icon bi bi-door-open"></i>
            <p>{{ __('Open Room') }}</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('customer.index') }}"
            class="nav-link {{ request()->routeIs('customer.index') || request()->routeIs('customer.add') || request()->routeIs('customer.edit') || request()->routeIs('customer_comment.index') || request()->routeIs('customer_comment.add') || request()->routeIs('customer_comment.edit') ? 'active' : '' }}">
            <i class="nav-icon bi bi-people"></i>
            <p>{{ __('Tenant Management') }}</p>
        </a>
    </li>
    <li
        class="nav-item {{ request()->routeIs('room_type.index') || request()->routeIs('room_type.add') || request()->routeIs('room_type.edit') || request()->routeIs('room.index') || request()->routeIs('room.add') || request()->routeIs('room.edit') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon bi bi-door-closed"></i>
            <p>
                {{ __('Room Management') }}
                <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('room_type.index') }}"
                    class="nav-link {{ request()->routeIs('room_type.index') || request()->routeIs('room_type.add') || request()->routeIs('room_type.edit') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Type') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('room.index') }}"
                    class="nav-link {{ request()->routeIs('room.index') || request()->routeIs('room.add') || request()->routeIs('room.edit') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Room') }}</p>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item {{ request()->routeIs('report.payment') || request()->routeIs('report.outstanding') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pie-chart"></i>
            <p>
                {{ __('Report Management') }}
                <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('report.payment') }}"
                    class="nav-link {{ request()->routeIs('report.payment') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Payment') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('report.outstanding') }}"
                    class="nav-link {{ request()->routeIs('report.outstanding') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Outstanding') }}</p>
                </a>
            </li>
        </ul>
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
