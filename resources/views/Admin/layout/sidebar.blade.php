{{--<h2>{{$composerVariable}}</h2>--}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin K&D</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/D.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
{{--        <div class="form-inline">--}}
{{--            <div class="input-group" data-widget="sidebar-search">--}}
{{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-sidebar">--}}
{{--                        <i class="fas fa-search fa-fw"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link ">
{{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
                        <p>
                            Dashboard
{{--                            <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index.html" class="nav-link active">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v1</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                         Danh muc
                            <i class="fas fa-angle-left right"></i>

                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                                <span class="badge badge-info right">2</span>
                            @else
                                <span class="badge badge-info right">1</span>
                            @endif
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('cate.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                            <li class="nav-item">
                                <a href="{{route('cate.add')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('cate.read_delete')}}" class="nav-link">--}}
{{--                                    <i class="far fa-circle nav-icon"></i>--}}
{{--                                    <p>Danh mục đã xóa</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        @endif

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                          Bài viết
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('post.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('post.add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Comment
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('comment.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>



                    </ul>
                </li>
              @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                User
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('user.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('user.read_delete')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục đã xóa</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{url('thoat')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Logout

                        </p>
                    </a>


{{--                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        {{ csrf_field() }}--}}
{{--                    </form>--}}

                </li>

                <li class="nav-item">
                    <a href="{{url('tin-tuc')}}" class="nav-link">
{{--                        <i class="fas fa-sign-out-alt"></i>--}}
                        <p>
                            Giao diện

                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <!-- /.sidebar -->
</aside>
