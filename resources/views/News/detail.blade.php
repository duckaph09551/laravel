@extends('News.layout.main')
@section('title','BÀI VIẾT')
@section('content')


    <main id="main">
        <!-- ======= Breadcrumbs ======= -->


        <!-- ======= About Section ======= -->
        <section id="about" class="about mt-5">
            <div class="container" data-aos="fade-up">
                <div class="breadcrumb-wrap mb-5">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('tin-tuc')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('cate.post',['id'=>$detail->cate_id])}}">{{$detail->getCateName->name}}</a></li>
                        <li class="breadcrumb-item active">Chi tiết bài viết</li>
                    </ul>

                </div>
                <div class="row">
                    <div class="col-lg-4 order-1 order-lg-2 " data-aos="fade-left" data-aos-delay="100">
                        <a href="#">                        <img src="https://redi.vn/wp-content/uploads/2019/05/dich-vu-thiet-ke-hinh-anh-quang-cao-slider.jpg" class="img-fluid" alt="">
                        </a>
                        <div class="mt-3">
                            <a href="#">                            <img src="https://inanaz.com.vn/wp-content/uploads/2020/02/mau-banner-quang-cao-3.jpg" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>{{$detail->title}}</h3>

                        <div class="mt-3 d-flex ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  fill="currentColor" class="bi bi-eye mt-1 mr-1" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                            </svg>
{{--                            <i class="far fa-eye" aria-hidden="true" id="viewNumber">--}}
{{--                                @foreach($detail->getView as $view)--}}
{{--                                    {{$view->view}}--}}

{{--                                @endforeach--}}
                              <p>  {{$totalView}}</p>
{{--                            </i>--}}

                            <p class="ml-3 text-secondary">Đã xuất bản  : {{\Carbon\Carbon::parse($detail->created_at)->diffForHumans()}}</p>

                        </div>
                        <div>
                            <p>{{$detail->short_desc}}</p>
                        </div>
                        <p class="font-italic">
                            {!! $detail->content !!}
                        </p>



                    </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->




        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">
                <div class="comment-form-wrap pt-5">
                    <div class="section-title">
                        <h2>Nội dung bình luận</h2>

                    </div>
                    <ul class="comment-list list-unstyled" id="hienthi">
                        @foreach(\App\Models\Comment::where('post_id',$detail->id)->get() as $comment)
                            @if($comment->status == 1)
                                <li class="comment d-flex">
                                    <div class="vcard bio">

                                        <img src="{{asset('news/img/anh-4.jpg')}} " style="width: 50px;height: 50px;border-radius: 50%;margin-right: 10px;"/>
                                    </div>
                                    <div class="comment-body">

                                        <div class="meta d-flex">
                                            <p class="mr-3">{{$comment->getUserName->name}}</p>
                                            ( {{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}})
                                        </div>
                                        <p>{{$comment->content}}</p>

                                    </div>
                                </li>
                            @endif


                        @endforeach
                    </ul>
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <h3 class="mb-5">Bình luận</h3>
                        <form action="{{route('post.comment')}}" method="POST">
{{--                        <form action="" method="post">--}}
                            @csrf
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="contents" id="message" cols="10" rows="10" class="form-control"></textarea>
                            </div>
                            @error('contents')
                            <small class="text-danger form-text mb-3">{{$message}}</small>
                            @enderror
                            <div class="form-group">
                                <input   type="submit"  name="btnComment" value="Gửi bình luận"
                                       class="btn py-3 px-4 btn-primary" >

{{--                                <a  onclick="addComment()"   class="btn btn-success " >Bình luận</a>--}}

                            </div>

                            <input type="hidden" name="post_id" value="{{$detail->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </form>
                    @else
                        <h3 class="mb-5">Bạn phải <a href="{{url('dang-nhap')}}">Đăng nhập </a> mới có thể bình luận</h3>
                    @endif




                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->

        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Bài viết liên quan</h2>

                </div>

                <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">
                    @foreach($relatedNew as $relatedNew)
                      @if($relatedNew->id != $detail->id)
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    @if(strcasecmp(substr($relatedNew->images,0,5),'https') == 0)
                                        <img src="{{$relatedNew->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">

                                    @else
                                        <img src="{{asset('public/uploads/')."/".$relatedNew->images}}" class="img-fluid" alt="..." style="height: 249px;width: 348px;object-fit: cover">
                                    @endif
                                    {{--                            <img  src="{{asset('public/uploads/')."/".$relatedNew->images}}" class="testimonial-img" alt="">--}}

                                    {{--                            <h3><a href="{{route('post.detail',['id'=>$relatedNew->id])}}">{{$relatedNew->title}}</a></h3>--}}
                                    <h3><a href="{{route('post.detail',['id'=>$relatedNew->id,'slug'=>\Illuminate\Support\Str::slug($relatedNew->title)])}}.html">{{$relatedNew->title}}</a></h3>

                                    <p>
                                        {!! $relatedNew->short_desc !!}

                                    </p>
                                </div>
                            </div>

                        @endif
                    @endforeach


                </div>

            </div>
        </section>

    </main>
    <!-- End #main -->

@endsection


@section('page-script')



    <script>
        let increaseViewUrl = "{{route('post.tangView')}}";
        const data = {
            id: {{$detail->id}},
            _token: "{{csrf_token()}}"
        };
        setTimeout(() => {
            fetch(increaseViewUrl, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(responseData => responseData.json())
                .then(productObj => {
                    // console.log(productObj);
                    // document.querySelector('#viewNumber').innerText = "Lượt xen : "+productObj.view;
                })
        }, 3000);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
{{--    <script !src="">--}}
{{--        function addComment(){--}}

{{--            var url = 'http://127.0.0.1:8000/comment';--}}
{{--            const content = document.querySelector('[name="contents"]').value;--}}
{{--            const post_id = document.querySelector('[name="post_id"]').value;--}}
{{--            const user_id = document.querySelector('[name="user_id"]').value;--}}

{{--            const  requestObj = {--}}
{{--                contents:content,--}}
{{--                status:1,--}}
{{--                post_id:post_id,--}}
{{--                user_id:user_id,--}}

{{--            }--}}
{{--            axios.post(url, requestObj)--}}
{{--                .then(data => {--}}
{{--                   var x = data.data;--}}
{{--                    console.log(x);--}}

{{--                   //  var result = x.map(function (element) {--}}
{{--                   //     return `<li class="comment d-flex">--}}
{{--                   //         <div class="vcard bio">--}}
{{--                   //--}}
{{--                   //             <img src="http://127.0.0.1:8000/news/img/anh-4.jpg" style="width: 50px;height: 50px;border-radius: 50%;margin-right: 10px;"/>--}}
{{--                   //         </div>--}}
{{--                   //         <div class="comment-body">--}}
{{--                   //--}}
{{--                   //             <div class="meta d-flex">--}}
{{--                   //                 <p class="mr-3">${element.user_id}</p>--}}
{{--                   //                 ( ${element.created_at})--}}
{{--                   //             </div>--}}
{{--                   //             <p>${element.content}</p>--}}
{{--                   //--}}
{{--                   //         </div>--}}
{{--                   //     </li>`--}}
{{--                   // });--}}
{{--                   //  document.querySelector('#hienthi').innerHTML = result.join(' ');--}}
{{--                })--}}
{{--                .catch(error => {--}}
{{--                    console.log(error.response)--}}
{{--                });--}}
{{--            return false;--}}
{{--        }--}}








{{--    </script>--}}




    <script type="text/javascript">
        $(document).ready(function() {
            $("#message").emojioneArea({
                pickerPosition: "top",
                filtersPosition: "bottom",
                tonesStyle: "checkbox"
            });
        });
    </script>


@endsection
