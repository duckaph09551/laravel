@extends('News.layout.main')
@section('content')
    <main id="main">
        <section id="features" class="features" style="margin-top: 140px">
            <div class="container text-center">
{{--                <iframe src ="https://covid19.vnanet.vn/home/indexwiget" frameborder="0" width="100%" style="min-height: 430px;" > </iframe>--}}
                <div  id="corona-banner" style="margin: 10px auto;width: 100%!important;cursor: pointer; display: inline-block;"><iframe style="width: 100%; pointer-events: none; height: 30px;" frameborder="0" src="https://gadgets.dantri.com.vn/corona/mini" id="e3b34599-51e8-4c80-b31b-efe8881fc727"></iframe></div>
            </div>
{{--            <div class="container">--}}
{{--                <iframe src ="https://covid19.vnanet.vn/home/indexwigetsummary" frameborder="0" width="100%" style="min-height: 250px;" > </iframe>--}}
{{--            </div>--}}

{{--            <div class=" container section-title p-3">--}}
{{--                <h2>Danh mục tin tức</h2>--}}
{{--                <p></p>--}}
{{--            </div>--}}
{{--            <div class="container" data-aos="fade-up">--}}

{{--                <div class="row" data-aos="zoom-in" data-aos-delay="100">--}}
{{--                    @foreach($x as $x)--}}
{{--                        <div class="col-lg-3 col-md-4 mb-3">--}}
{{--                            <div class="icon-box">--}}
{{--                                <i class="ri-store-line" style="color: #ffbb2c;"></i>--}}

{{--                                @if($x->logo == " ")--}}
{{--                                    <img src="{{asset('public/uploads/')+"/"+""}}" alt="">--}}
{{--                                @else--}}
{{--                                    <img  class="mr-3" src="{{asset('public/uploads/')."/".$x->logo}}" style="width: 40px;height: 40px; border-radius: 50%"/>--}}
{{--                                @endif--}}

{{--                                <h3><a href="{{route('cate.post',['id'=>$x->id])}}">{{$x->name}}</a></h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

{{--                </div>--}}

{{--            </div>--}}
        </section>
        <!-- End Features Section -->

        <!-- ======= Popular Courses Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>BÀI VIẾT MỚI NHẤT TRONG NGÀY</h2>
                    <p></p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($postNew as $new)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            @if(strcasecmp(substr($new->images,0,5),'https') == 0)
                                <img src="{{$new->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">

                            @else
                                <img src="{{asset('public/uploads/')."/".$new->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">
                            @endif
{{--                            <img src="{{asset('public/uploads/')."/".$new->images}}" class="img-fluid" alt="...">--}}

                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>{{$new->getCateName->name}}</h4>
{{--                                    @foreach($new->getView as $view)--}}

{{--                                        <p class="price">Lượt xem: {{$view->view}}</p>--}}
{{--                                    @endforeach--}}

{{--                                    <i class="fa fa-eye text-secondary pt-1" aria-hidden="true" id="viewNumber"></i>--}}
                                    <p class="ml-3 text-secondary">Đã xuất bản  : {{\Carbon\Carbon::parse($new->created_at)->diffForHumans()}}</p>

                                </div>

{{--                                <h3><a href="{{route('post.detail',['id'=>$new->id])}}">{{$new->title}}</a></h3>--}}
                                <h3><a href="{{route('post.detail',['id'=>$new->id,'slug'=>\Illuminate\Support\Str::slug($new->title)])}}.html">{{$new->title}}</a></h3>


                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
{{--                <div class="d-flex justify-content-lg-end mt-3">--}}
{{--                    {{$postNew->links()}}--}}

{{--                </div>--}}
            </div>
        </section>
        <!-- End Popular Courses Section -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>BÀI VIẾT NỔI BẬT NHẤT TRONG 2 NGÀY QUA</h2>
                    <p></p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($postViewTwoDay as $postViewTwoDays)
                        @if($postViewTwoDays->getNamePost->status == 1)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            @if(strcasecmp(substr($postViewTwoDays->getNamePost->images,0,5),'https') == 0)
                                <img src="{{$postViewTwoDays->getNamePost->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">

                            @else
                                <img src="{{asset('public/uploads/')."/".$postViewTwoDays->getNamePost->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">
                            @endif
{{--                            <img  src="{{asset('public/uploads/')."/".$postViewTwoDays->getNamePost->images}}" class="img-fluid" alt="...">--}}

                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                   @foreach($postAll as $xyz)
                                       @if($xyz->id == $postViewTwoDays->post_id)
                                            <h4>{{$xyz->getCateName->name}}</h4>
                                        @endif
                                    @endforeach

{{--                                    <p class="price">Lượt view {{$postViewTwoDay->view}}</p>--}}
                                    <p class="ml-3 text-secondary">Đã xuất bản  : {{\Carbon\Carbon::parse($postViewTwoDays->getNamePost->created_at)->diffForHumans()}}</p>

                                </div>

{{--                                <h3><a href="{{route('post.detail',['id'=>$postViewTwoDays->getNamePost->id])}}">{{$postViewTwoDays->getNamePost->title}}</a></h3>--}}
                                <h3><a href="{{route('post.detail',['id'=>$postViewTwoDays->getNamePost->id,'slug'=>\Illuminate\Support\Str::slug($postViewTwoDays->getNamePost->title)])}}.html">{{$postViewTwoDays->getNamePost->title}}</a></h3>

                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach


                </div>
{{--                <div class="d-flex justify-content-lg-end mt-3">--}}
{{--                    {{$postViewTwoDay->links()}}--}}

{{--                </div>--}}
            </div>
        </section>
        <!-- ======= Trainers Section ======= -->


        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>BÀI VIẾT TRONG TUẦN QUA</h2>
                    <p></p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($postWeek as $postWeeks)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            @if(strcasecmp(substr($postWeeks->images,0,5),'https') == 0)
                                <img src="{{$postWeeks->images}}" class="img-fluid " alt="..." style="height: 249px;width: 348px;object-fit: cover">

                            @else
                                <img src="{{asset('public/uploads/')."/".$postWeeks->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">
                            @endif
{{--                            <img  src="{{asset('public/uploads/')."/".$postWeeks->images}}" class="img-fluid" alt="...">--}}
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">

                                            <h4>{{$postWeeks->getCateName->name}}</h4>

                                    {{--                                    <h4>{{$postViewTwoDay->getCateName->name}}</h4>--}}
                                    {{--                                    <p class="price">Lượt view {{$postViewTwoDay->view}}</p>--}}
                                    <p class="ml-3 text-secondary">Đã xuất bản  : {{\Carbon\Carbon::parse($postWeeks->created_at)->diffForHumans()}}</p>

                                </div>

{{--                                <h3><a  href="{{route('post.detail',['id'=>$postWeeks->id])}}">{{$postWeeks->title}}</a></h3>--}}
                                <h3><a href="{{route('post.detail',['id'=>$postWeeks->id,'slug'=>\Illuminate\Support\Str::slug($postWeeks->title)])}}.html">{{$postWeeks->title}}</a></h3>

                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="d-flex justify-content-lg-end mt-3">
                          {{$postWeek->links()}}

                </div>
            </div>
        </section>
        <!-- End Trainers Section -->

    </main>
@endsection
