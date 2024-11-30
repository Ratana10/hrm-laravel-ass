<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
  <li class="nav-item"> 
    <a href="./generate/theme.html" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"> <i class="nav-icon bi bi-palette"></i>
        <p>{{  __('Dashboard')  }}</p>
    </a> 
  </li>
  <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
          <p>
              Dashboard
              <i class="nav-arrow bi bi-chevron-right"></i>
          </p>
      </a>
      <ul class="nav nav-treeview">
          <li class="nav-item"> <a href="./index2.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                  <p>Dashboard v2</p>
              </a> </li>
      </ul>
  </li>

  
</ul> <!--end::Sidebar Menu-->
