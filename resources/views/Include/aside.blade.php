<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{asset('/public/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">

                <p>{{auth()->user()->name}}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                    <span class="pull-left-container">
            </span>
                </a>

            </li>


        @can('تعاریف پایه')
            <li id="BasicDefinitions" class="treeview">
                <a href="#">
                    <i class="fa fa-user-plus"></i> <span>تعاریف پایه</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.users.index')}}"><i
                                class="fa fa-circle-o"></i>کاربران</a></li>
                    <li><a href="{{route('admin.role.index')}}"><i class="fa fa-circle-o"></i>دسترسی ها</a></li>
                    <li><a href="{{route('admin.product.index')}}"><i class="fa fa-circle-o"></i>محصولات</a></li>
                    <li><a href="{{route('admin.brand.index')}}"><i class="fa fa-circle-o"></i>برندها</a></li>
                </ul>

            </li>
        @endcan
        @can('داروخانه')
            <li class="treeview" id="pharmacy">
                <a href="#">
                    <i class="fa fa-plus"></i> <span>داروخانه</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.pharmacy.index')}}"><i
                                class="fa fa-circle-o"></i>ثبت سفارش</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>آرشیو سفارشات</a></li>
                </ul>
            </li>
        @endcan
        @can('تامیین کننده')
            <li id="Supplier" class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>تامیین کننده</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.suppliers.index')}}"><i
                                class="fa fa-circle-o"></i>مشاهده سفارشات</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>آرشیو پیشهادهای شما</a>
                    </li>
                </ul>
            </li>

        @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
