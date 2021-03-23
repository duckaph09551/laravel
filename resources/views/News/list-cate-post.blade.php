@extends('News.layout.main')
@section('content')

    <main id="main" data-aos="fade-in">
        <section id="courses" class="courses ">
            <div class="container" data-aos="fade-up">
                                <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in">
                                    <div class="container">
                                        <h2>Danh mục</h2>
                                        <p>{{$cateName->name}}</p>
                                    </div>
                                </div>
                <div class="row mt-3" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($list_post as $post)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if(strcasecmp(substr($post->images,0,5),'https') == 0)
                                    <img src="{{$post->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">

                                @else
                                    <img src="{{asset('public/uploads/')."/".$post->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">
                                @endif
{{--                                <img src="{{asset('public/uploads/')."/".$post->images}}" class="img-fluid" alt="">--}}
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{$post->getCateName->name}}</h4>
                                        {{--                                    @foreach($new->getView as $view)--}}

                                        {{--                                        <p class="price">Lượt xem: {{$view->view}}</p>--}}
                                        {{--                                    @endforeach--}}

                                        {{--                                    <i class="fa fa-eye text-secondary pt-1" aria-hidden="true" id="viewNumber"></i>--}}
                                        <p class="ml-3 text-secondary">Đã xuất bản  : {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>

                                    </div>

{{--                                    <h3><a href="{{route('post.detail',['id'=>$post->id])}}">{{$post->title}}</a></h3>--}}
                                    <h3><a href="{{route('post.detail',['id'=>$post->id,'slug'=>\Illuminate\Support\Str::slug($post->title)])}}.html">{{$post->title}}</a></h3>


                                    {{--                                <div class="trainer d-flex justify-content-between align-items-center">--}}
                                    {{--                                    <div class="trainer-profile d-flex align-items-center">--}}
                                    {{--                                        <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">--}}
                                    {{--                                        <span>Antonio</span>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div class="trainer-rank d-flex align-items-center">--}}
                                    {{--                                        <i class="bx bx-user"></i>&nbsp;50--}}
                                    {{--                                        &nbsp;&nbsp;--}}
                                    {{--                                        <i class="bx bx-heart"></i>&nbsp;65--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>
                <div class="d-flex justify-content-lg-end">
                    {{$list_post->links()}}
                </div>
            </div>
        </section><!-- End Courses Section -->

    </main><!-- End #main -->
    </div>

@endsection
