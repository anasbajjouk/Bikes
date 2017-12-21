
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
        </form>
      -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="">
              <a href="{{ route('admin.index') }}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i> Products</a></li>
                <li><a href="{{ route('product.create') }}"><i class="fa fa-circle-o"></i> Add Products</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Widgets</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="{{ route('widget.index') }}"><i class="fa fa-circle-o"></i> Widgets</a></li>
                <li><a href="{{ route('widget.create') }}"><i class="fa fa-circle-o"></i> Add Widget</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Categories</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i> Categories</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Widgets Categories</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="{{ route('widgetCategory.create') }}"><i class="fa fa-circle-o"></i> Widgets Categories</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a> 
              <ul class=" treeview-menu">
                <li class=""><a href="{{ route('order.orders') }}"><i class="fa fa-circle-o"></i> Orders</a></li>

                <li class=""><a href="{{ url('admin/orders/pending') }}"><i class="fa fa-circle-o"></i> Pending Orders</a></li>

                <li class=""><a href="{{ url('admin/orders/delivered') }}"><i class="fa fa-circle-o"></i> Completed Orders</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=""><a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a></li>

                <li class=""><a href="{{ route('user.normalusers') }}"><i class="fa fa-circle-o"></i> Normal Users</a></li>
              
                <li class=""><a href="{{ route('user.admins') }}"><i class="fa fa-circle-o"></i> Admins</a></li>
                
                @if(Auth::user()->role == 'super_admin')
                  <li class=""><a href="{{ route('user.create') }}"><i class="fa fa-circle-o"></i> Create User</a></li>
                @endif

              </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
