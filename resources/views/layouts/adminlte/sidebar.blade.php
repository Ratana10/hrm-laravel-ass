<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"> <i
                class="nav-icon bi bi-palette"></i>
            <p>{{ __('Dashboard') }}</p>
        </a>
    </li>
    @if(Auth::check() && (strtolower(Auth::user()->role->name) === 'admin' || strtolower(Auth::user()->role->name) === 'hr'))
    <li class="nav-item">
        <a href="{{ route('employees.index') }}"
                class="nav-link {{ request()->routeIs('employees.index') || request()->routeIs('employees.add') || request()->routeIs('employees.edit') ? 'active' : '' }}">
                <i class="nav-icon bi bi-receipt"></i>
                <p>{{ __('Employee') }}</p>
            </a>
    </li>
    @endif

    <li class="nav-item">
        <a href="{{ route('attendances.index') }}"
                class="nav-link {{ request()->routeIs('attendances.index') || request()->routeIs('attendances.add') || request()->routeIs('attendances.edit') ? 'active' : '' }}">
                <i class="nav-icon bi bi-receipt"></i>
                <p>{{ __('Attendance') }}</p>
        </a>
    </li>



    <li class="nav-item">
        <a href="{{ route('leaves.index') }}"
                class="nav-link {{ request()->routeIs('leaves.index') || request()->routeIs('leaves.add') || request()->routeIs('leaves.edit') ? 'active' : '' }}">
                <i class="nav-icon bi bi-palette"></i>
                <p>{{ __('Leave') }}</p>
            </a>
    </li>


    @if(Auth::check() && (strtolower(Auth::user()->role->name) === 'admin' || strtolower(Auth::user()->role->name) === 'hr'))
    <li class="nav-item">
        <a href="{{ route('payrolls.index') }}"
                class="nav-link {{ request()->routeIs('payrolls.index') || request()->routeIs('payrolls.add') || request()->routeIs('payrolls.edit') ? 'active' : '' }}">
                <i class="nav-icon bi bi-receipt"></i>
                <p>{{ __('Payroll') }}</p>
            </a>
    </li>
    @endif
   
    @if(Auth::check() && (strtolower(Auth::user()->role->name) === 'admin'))
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
                <a href="{{ route('user.index') }}"
                    class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('User') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}"
                    class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Roles') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('company.index') }}"
                    class="nav-link {{ request()->routeIs('company.index') ? 'active' : '' }}"> <i
                        class="nav-icon bi bi-circle"></i>
                    <p>{{ __('Company') }}</p>
                </a>
            </li>
        </ul>
    </li>
    @endif


</ul> <!--end::Sidebar Menu-->
