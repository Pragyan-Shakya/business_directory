<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ $user->get_avatar() }}" class="img-circle" alt="{{ $user->full_name() }}">
            </div>
            <div class="pull-left info">
                <p>{{ $user->full_name() }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ \Request::is('admin/dashboard*')?'active':'' }}  ">
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @can(['industry-list','company-list','company-create'])
                <li class="{{ (\Request::is('admin/company*')||\Request::is('admin/industry*'))?'active':'' }} treeview">
                    <a href="#">
                        <i class="fa fa-institution"></i>
                        <span>Companies</span>
                        <span class="pull-right-container"></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('company-list')<li class="{{ (\Request::is('admin/company')?'active':'') }}"><a href="{{ route('admin.company.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>@endcan
                        @can('company-create')<li class="{{ (\Request::is('admin/company/create')?'active':'') }}"><a href="{{ route('admin.company.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>@endcan
                        @can('industry-list')<li class="{{ (\Request::is('admin/industry*')?'active':'') }}"><a href="{{ route('admin.industry.index') }}"><i class="fa fa-circle-o"></i> Industry</a></li>@endcan
                    </ul>
                </li>
            @endcan
            @can(['user-list', 'employer-list', 'user-create'])
                <li class="{{ (\Request::is('admin/user*')||\Request::is('admin/employer*'))?'active':'' }} treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                        <span class="pull-right-container"></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user-list')<li class="{{ (\Request::is('admin/user')?'active':'') }}"><a href="{{ route('admin.user.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>@endcan
                        @can('user-create')<li class="{{ (\Request::is('admin/user/create')?'active':'') }}"><a href="{{ route('admin.user.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>@endcan
                    </ul>
                </li>
            @endcan
            @can(['role-list','role-create','role-moderate'])
                <li class="{{ (\Request::is('admin/role*')||\Request::is('admin/permission*'))?'active':'' }} treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-lock"></i>
                        <span>Roles & Permissions</span>
                        <span class="pull-right-container"></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('role-list')<li class="{{ (\Request::is('admin/role')?'active':'') }}"><a href="{{ route('admin.role.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>@endcan
                        @can('role-create')<li class="{{ (\Request::is('admin/role/create')?'active':'') }}"><a href="{{ route('admin.role.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>@endcan
                        @can('role-moderate')<li class="{{ (\Request::is('admin/moderator*')?'active':'') }}"><a href="{{ route('admin.moderator.index') }}"><i class="fa fa-circle-o"></i> Manage Moderator </a></li>@endcan
                        <li class="{{ (\Request::is('admin/permission*')?'active':'') }}"><a href="{{ route('admin.permission.index') }}"><i class="fa fa-circle-o"></i>Permission</a></li>
                    </ul>
                </li>
            @endcan

            @can(['testimonial-list','testimonial-create'])
                <li class="{{ \Request::is('admin/testimonial*')?'active':'' }}  ">
                    <a href="{{ route('admin.testimonial.index') }}">
                        <i class="glyphicon glyphicon-comment"></i>
                        <span>Testimonial</span>
                    </a>
                </li>
            @endcan
            @can(['blog-list','blog-create'])
                <li class="{{ Request::is('admin/blog*')?'active':'' }} treeview">
                    <a href="#">
                        <i class="glyphicon glyphicon-bold"></i>
                        <span>Blog</span>
                        <span class="pull-right-container"></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('blog-list')<li class="{{ (\Request::is('admin/blog')?'active':'') }}"><a href="{{ route('admin.blog.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>@endcan
                        @can('blog-create')<li class="{{ (\Request::is('admin/blog/create')?'active':'') }}"><a href="{{ route('admin.blog.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>@endcan
                    </ul>
                </li>
            @endcan
            @can('change-settings')
                <li class="{{ \Request::is('admin/setting*')?'active':'' }}  ">
                    <a href="{{ route('admin.setting.index') }}">
                        <i class="glyphicon glyphicon-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>