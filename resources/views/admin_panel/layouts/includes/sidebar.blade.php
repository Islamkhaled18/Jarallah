<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ Url('') }}/public/adminPanel/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
      <li class="header">القائمة الرئيسية</li>
      <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
      <li><a href="{{Url('admin_panel/settings')}}"><i class="fa fa-cogs"></i> اعدادت الموقع </a></li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>المشروفين</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-left pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Url('admin_panel/admins')}}"><i class="fa fa-eye"></i> عرض </a></li>
          <li><a href="{{Url('admin_panel/admins/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>الاعضاء</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-left pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Url('admin_panel/users')}}"><i class="fa fa-eye"></i> عرض </a></li>
          <li><a href="{{Url('admin_panel/users/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-car"></i> <span>المنتجات</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-left pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Url('admin_panel/ads')}}"><i class="fa fa-eye"></i> عرض </a></li>
          <li><a href="{{Url('admin_panel/ads/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-bookmark"></i> <span> نوع السيارة</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-left pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Url('admin_panel/cars_type')}}"><i class="fa fa-eye"></i> عرض </a></li>
          <li><a href="{{Url('admin_panel/cars_type/create')}}"><i class="fa fa-plus"></i> اضافة</a></li>
        </ul>
      </li>



    
      <li><a href="{{Url('admin_panel/about_us')}}"><i class="fa fa-cogs"></i> اعدادت من نحن</a></li>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope-o"></i><span> القائمة البريدية</span>
          <span class="pull-left-container">
            <i class="fa fa-angle-left pull-left"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{Url('admin_panel/contact')}}"><i class="fa fa-eye"></i> عرض </a></li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->

  <!-- /.sidebar -->
</aside>
