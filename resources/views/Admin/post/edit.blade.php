
@extends('Admin.layout.main')
@section('page-title','Sửa sản phẩm')
@section('title','Sửa sản phẩm')

@section('content')

    <div class="container">
        <div class="row">
            <div id="content" class="container-fluid">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('post.edit-save')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{$listItem->id}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="title">Tên bài viết <span class="text-danger font-weight-bold">(*)</span></label>

                                        <input class="form-control" type="text" name="title" id="title" value="{{$listItem->title}}">
                                        @error('title')
                                        <small class="text-danger form-text">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="intro">Mô tả <span class="text-danger font-weight-bold">(*)</span> </label>
                                        <textarea name="short_desc" class="form-control " id="intro" cols="30"
                                                  rows="5" value="{{old('short_desc')}}">{{$listItem->short_desc}}</textarea>
                                        @error('short_desc')
                                        <small class="text-danger form-text">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="intro">Chi tiết <span class="text-danger font-weight-bold">(*)</span></label>
                                <textarea name="content" class="form-control ckeditor" id="intro" cols="30"
                                          rows="5" value="">{{$listItem->content}}</textarea>
                                @error('content')
                                <small class="text-danger form-text">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="">Danh mục <span class="text-danger font-weight-bold">(*)</span></label>
                                <select class="form-control" id="" name="cate_id">
                                     @foreach($cate as $cate)
                                          @if($cate->id == $listItem->cate_id)
                                            <option value="{{$cate->id}}" selected>{{$listItem->getCateName->name}}</option>
                                        @else
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                         @endif
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="images">Hình ảnh</label>
                                <input class="form-control" type="file" name="images" id="image" value="{{old('images')}}">
                                @error('images')
                                <small class="text-danger form-text">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                @if(strcasecmp(substr($listItem->images,0,5),'https') == 0)
                                    <img src="{{$listItem->images}}" class="img-fluid " alt="..." style="height: 249px;width: 348px;object-fit: cover">

                                @else
                                    <img src="{{asset('public/uploads/')."/".$listItem->images}}" class="img-fluid" alt="..." style="height: 100px;width: 100px;object-fit: cover">
                                @endif
{{--                                <img style="width: 100px;height:100px" src="{{asset('public/uploads/')}}/{{$listItem->images}}" alt="">--}}
                                <input type="hidden" name="anh" value="{{$listItem->images}}">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái <span class="text-danger font-weight-bold">(*)</span></label>
                                <select class="form-control" id="" name="status">
                                    <option @if($listItem->status == 1 )  {{"selected=\"selected\""}}   @endif value="1">Hiển thị</option>
                                    <option @if($listItem->status == 0 )  {{"selected=\"selected\""}}   @endif value="0">Ân bài viết</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Author <span class="text-danger font-weight-bold">(*)</span></label>
                                <input class="form-control" type="text" name="author" id="name" value="{{$listItem->author }}">
                                @error('author')
                                <small class="text-danger form-text">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary" name="btn_submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
