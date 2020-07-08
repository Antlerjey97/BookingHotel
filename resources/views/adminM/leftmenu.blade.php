  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">

      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Trang chính</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Quản lý</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::asset('admin/partner/requests')}}"> Yêu cầu đối tác</a></li>
            <li><a href="{{URL::asset('admin/partner/list')}}"> Tất cả đối tác</a></li>
            <li><a href="{{URL::asset('admin/facilityadd')}}"> Thêm mới tiện ích</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.created')}}">Thêm mới User</a></li>
            <li><a href="{{route('admin.list')}}">Danh sách User</a></li>
            <li><a href="{{URL::asset('#')}}">Cập nhập User</a></li>
          </ul>
        </li>
          </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
