

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">

    <div class="container d-flex align-items-center">

        <h1 class="logo "><a href="{{url('tin-tuc')}}">K&D NEWS</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <div class="mr-5">
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="{{url('tin-tuc')}}">Trang chủ</a></li>
                    <li class="drop-down"><a href="">Danh mục</a>
                        <ul>
                            @foreach(\App\Models\Category::all() as $cate)
                            <li>
{{--                                <a href="{{route('cate.post',['id'=>$cate->id])}}">{{$cate->name}}</a>--}}
                                <a href="{{route('cate.post',['id'=>$cate->id,'slug'=>\Illuminate\Support\Str::slug($cate->name)])}}.html">{{$cate->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
                    <li>

                    </li>
                </ul>
                <!-- .nav-menu -->
            </nav>
        </div>
        <div>


            <div class="input-group  border rounded-pill p-1">
                <form action="{{route('post.search')}}" method="get">
                    @csrf
                    <input name="keyword" type="search" placeholder="Nhập từ bạn cần tìm?" aria-describedby="button-addon3" class="form-control bg-none border-0">

                </form>

            </div>

        </div>
        <div>
            <div class="b-ads">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            @if(\Illuminate\Support\Facades\Auth::check())
                            <li class="nav-item ">
                                <a class="nav-link" href="#">Xin chào : {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('thoat')}}">Logout</a>
                            </li>

                             @else


                            <li class="nav-item">
                                <a class="nav-link" href="{{url('dang-nhap')}}">Đăng nhập</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('dang-ky')}}">Đăng ký</a>
                            </li>

                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->

<!-- End Hero -->
