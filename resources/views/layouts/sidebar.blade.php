<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('dist/img/mylogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">iRzellACafe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/no-profile.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ @Auth::user()->name }} ( {{ @Auth::user()->role }} )</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{--  Data Customers  --}}
          <li class="nav-item">
            <a href="{{ url('customers') }}" class="nav-link {{ ($title=='Customers') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("customers") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("cus/form") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- End Data Customers  --}}

          {{--  Data Menu  --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ ($title=='Menu') ? 'active' : '' }}">
              <i class="nav-icon fas fa-utensils"></i>
              <p>
                Menus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("menu") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("menu/form") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>   
          {{-- End Data Menu  --}}

          {{--  Category  --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ ($title=='Category') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url("category") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url("category/form") }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>               
          {{--  End Category  --}}
          
         {{--  Meja  --}}
         <li class="nav-item">
          <a href="{{ url("category") }}" class="nav-link {{ ($title=='Meja') ? 'active' : '' }}">
            <i class="nav-icon fas fa-border-all"></i>
            <p>
              Meja
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('table') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('table/form') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
          </li>
        {{--  End Meja  --}}

        {{--  Kitchen  --}}
        <li class="nav-item">
          <a href="#" class="nav-link {{ ($title=='Kitchens') ? 'active' : '' }}">
            <i class="nav-icon fas fa-sink"></i>
            <p>
              Kitchen
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('kitchens') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kitchens/form') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>
          </ul>
        </li>
        {{--  End Kitchen  --}}

        {{--  Transaksi  --}}
        <li class="nav-item">
          <a href="{{ url('transaction') }}" class="nav-link {{ ($title=='Transactions') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
              Transaction
              {{--  <i class="right fas fa-angle-left"></i>  --}}
            </p>
          </a>
        </li> 
        {{--  End Transaksi  --}}
        <li class="nav-item">
          <a href="{{ url("report/transaction") }}" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>
              Laporan
              {{--  <i class="right fas fa-angle-left"></i>  --}}
            </p>
          </a>
        </li>                                 
        <li class="nav-item">
          <a href="{{ route("signout") }}" class="nav-link text-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Log Out
            </p>
          </a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>