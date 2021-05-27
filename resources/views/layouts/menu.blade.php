<?php
$supp_show = auth()->user()->hasPermissionTo('supplier-list','web');
$supp_add = auth()->user()->hasPermissionTo('supplier-create','web');
$supp_edit = auth()->user()->hasPermissionTo('supplier-edit','web');
$supp_del = auth()->user()->hasPermissionTo('supplier-delete','web');

$prod_show = auth()->user()->hasPermissionTo('product-list','web');
$prod_add = auth()->user()->hasPermissionTo('product-create','web');
$prod_edit = auth()->user()->hasPermissionTo('product-edit','web');
$prod_del = auth()->user()->hasPermissionTo('product-delete','web');

$qrcode_print = auth()->user()->hasPermissionTo('qrcode-print','web');

$cat_show = auth()->user()->hasPermissionTo('product-cat-list','web');
$cat_add = auth()->user()->hasPermissionTo('product-cat-create','web');
$cat_edit = auth()->user()->hasPermissionTo('product-cat-edit','web');
$cat_del = auth()->user()->hasPermissionTo('product-cat-delete','web');

$del_show = auth()->user()->hasPermissionTo('delivery-list','web');
$del_add = auth()->user()->hasPermissionTo('delivery-create','web');
$del_edit = auth()->user()->hasPermissionTo('delivery-edit','web');
$del_del = auth()->user()->hasPermissionTo('delivery-delete','web');

$ord_show = auth()->user()->hasPermissionTo('order-list','web');
$ord_add = auth()->user()->hasPermissionTo('order-create','web');
$ord_edit = auth()->user()->hasPermissionTo('order-edit','web');
$ord_del = auth()->user()->hasPermissionTo('order-delete','web');

$dept_show = auth()->user()->hasPermissionTo('department-list','web');
$dept_add = auth()->user()->hasPermissionTo('department-create','web');
$dept_edit = auth()->user()->hasPermissionTo('department-edit','web');
$dept_del = auth()->user()->hasPermissionTo('department-delete','web');

$user_show = auth()->user()->hasPermissionTo('user-list','web');
$user_add = auth()->user()->hasPermissionTo('user-create','web');
$user_edit = auth()->user()->hasPermissionTo('user-edit','web');
$user_del = auth()->user()->hasPermissionTo('user-delete','web');

$role_show = auth()->user()->hasPermissionTo('role-list','web');
$role_add = auth()->user()->hasPermissionTo('role-create','web');
$role_edit = auth()->user()->hasPermissionTo('role-edit','web');
$role_del = auth()->user()->hasPermissionTo('role-delete','web');
?>

          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="{{ route('clients.index') }}" class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>Clients</p>
            </a>
          </li> --}}


          @if($supp_show || $supp_add || $supp_edit || $supp_del)
          <li class="nav-item">
            <a href="{{ route('suppliers.index') }}" class="nav-link {{ Request::is('suppliers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Suppliers</p>
            </a>
          </li>
          @endif


          <li class="nav-item {{ Request::is('products*','qrcode*','productCategories*') ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('products*','qrcode*','productCategories*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

                @if($prod_show || $prod_add || $prod_edit || $prod_del)
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>Product List</p>
                    </a>
                </li>
                @endif
                @if($qrcode_print)
                <li class="nav-item">
                    <a href="{{ route('qrcode') }}" class="nav-link {{ Request::is('qrcode*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>QR Codes</p>
                    </a>
                </li>
                @endif
                @if($cat_show || $cat_add || $cat_edit || $cat_del)
                <li class="nav-item">
                    <a href="{{ route('productCategories.index') }}" class="nav-link {{ Request::is('productCategories*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Categories</p>
                    </a>
                </li>
                @endif
              </ul>
          </li>

          @if($del_show || $del_add || $del_edit || $del_del || $ord_show || $ord_add || $ord_edit || $ord_del)
          <li class="nav-item {{ Request::is('users*','orders*','deliveries*') ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('users*','orders*','deliveries*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Inventory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fas fa-chart-pie nav-icon"></i>
                        <p>Statistics</p>
                    </a>
                </li>

                @if($del_show || $del_add || $del_edit || $del_del)
                <li class="nav-item">
                    <a href="{{ route('deliveries.index') }}" class="nav-link {{ Request::is('deliveries*') ? 'active' : '' }}">
                        <i class="fas fa-dolly-flatbed nav-icon"></i>
                        <p>Deliveries</p>
                    </a>
                </li>
                @endif
                @if($ord_show || $ord_add || $ord_edit || $ord_del)
                <li class="nav-item">
                    <a href="{{ route('orders.index') }}" class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart nav-icon"></i>
                        <p>Orders</p>
                    </a>
                </li>
                @endif
              </ul>
          </li>
          @endif

          @can('department-list','department-create','department-edit','department-delete','user-list','user-create','user-edit','user-delete','role-list','role-create','role-edit','role-delete')
          <li class="nav-header">Settings</li>
          <li class="nav-item {{ Request::is('users*','departments*','roles*','permissions*') ? 'has-treeview menu-open' : '' }}">
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*','departments*','roles*','permissions*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- @endcan --}}
              @can('department-list','department-create','department-edit','department-delete')
              <li class="nav-item">
                <a href="{{ route('departments.index') }}" class="nav-link {{ Request::is('departments*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departments</p>
                </a>
              </li>
              @endcan
              @can('user-list','user-create','user-edit','user-delete')
              <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              @endcan
              @can('role-list','role-create','role-edit','role-delete')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              {{-- <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link {{ Request::is('permissions*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissions</p>
                </a>
              </li> --}}
            </ul>
          </li>
          @endcan




{{-- <li class="{{ Request::is('supplierContacts*') ? 'active' : '' }}">
    <a href="{{ route('supplierContacts.index') }}"><i class="fa fa-edit"></i><span>Supplier Contacts</span></a>
</li> --}}
