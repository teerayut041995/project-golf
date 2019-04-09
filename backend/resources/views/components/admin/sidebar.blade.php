      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('template/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>จัดการข้อมูลโปรโมชัน</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/promotions')}}">ข้อมูลข้อมูลโปรโมชัน</a></li>
            <li><a href="{{url('admin/promotions/create')}}">เพิ่มข้อมูลโปรโมชัน</a></li>
            <li><a href="#">รายงานการซื้อข้อมูลโปรโมชัน</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>จัดการข้อมูลกิจกรรม</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/activities')}}">ข้อมูลกิจกรรมทั้งหมด</a></li>
            <li><a href="{{url('admin/activities/create')}}">เพิ่มข้อมูลกิจกรรม</a></li>
            <li><a href="#">รายงานการซื้อกิจกรรม</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>ข้อมูลธนาคาร</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('admin/banks')}}">ข้อมูลทั้งหมด</a></li>
            <li><a href="{{url('admin/banks/create')}}">เพิ่มข้อมูล</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
      