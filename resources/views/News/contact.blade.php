@extends('News.layout.main')

@section('title','Liên hệ')
@section('content')


    <!-- Breadcrumb Start -->

    <!-- Breadcrumb End -->

    <main id="main">

        <section id="contact" class="contact">


            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14966.565719498312!2d105.92944022281303!3d20.315103832226566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3136784f7a64efe5%3A0x269484bf3f8d5d6b!2zTmluaCBHaWFuZywgSG9hIEzGsCwgTmluaCBCw6xuaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1612597400069!5m2!1svi!2s"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <div class="container" data-aos="fade-up">

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Địa chỉ</h4>
                                <p>Ninh Giang - Hoa Lư - Ninh Bình</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>duckaph09551@fpt.edu.vn</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Điện thoại:</h4>
                                <p>0964864347</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">


                                        <div class="contact-form">
                                            <form method="post" action="">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <input type="text" name="username" class="form-control" placeholder="Tên" />
                                                        @error('username')
                                                        <small class="text-danger form-text">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <input type="email" name="email" class="form-control" placeholder="Email" />
                                                        @error('email')
                                                        <small class="text-danger form-text">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control" placeholder="Tiêu đề" />
                                                    @error('title')
                                                    <small class="text-danger form-text">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="contents" rows="5" placeholder="Nội dung"></textarea>
                                                    @error('contents')
                                                    <small class="text-danger form-text">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div><button class="btn btn-success" type="submit">Gửi</button></div>
                                            </form>
                                        </div>
                                        <div class="flash-message mt-5">
                                            @foreach (['danger', 'success'] as $msg)
                                                @if(Session::has('alert-' . $msg))
                                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                @endif
                                            @endforeach

                        </div>
                        <!-- Contact End -->

                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>

@endsection
