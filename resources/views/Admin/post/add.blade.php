
@extends('Admin.layout.main')
@section('page-title','Thêm bài viết')
@section('title','Thêm bài viết')

@section('content')

  <div class="container">
      <div class="row">
          <div id="content" class="container-fluid">
              <div class="card">

                  <div class="card-body">
                      <form action="{{route('post.add-save')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                          <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="title">Title <span class="text-danger font-weight-bold">(*)</span></label>

                                      <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
                                      @error('title')
                                      <small class="text-danger form-text">{{$message}}</small>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="intro">Short_desc <span class="text-danger font-weight-bold">(*)</span></label>
                                      <textarea name="short_desc" class="form-control " id="intro" cols="30"
                                                rows="5" value="{{old('short_desc')}}">{{old('short_desc')}}</textarea>
                                      @error('short_desc')
                                      <small class="text-danger form-text">{{$message}}</small>
                                      @enderror
                                  </div>
                              </div>
                          </div>


                          <div class="form-group">
                              <label for="intro">Content <span class="text-danger font-weight-bold">(*)</span></label>
                              <textarea name="content" class="form-control " id="intro" cols="30"
                                        rows="5" value="">{{old('content')}}</textarea>
                              @error('content')
                              <small class="text-danger form-text">{{$message}}</small>
                              @enderror
                          </div>


                          <div class="form-group">
                              <label for="">Danh mục <span class="text-danger font-weight-bold">(*)</span></label>
                              <select class="form-control" id="" name="cate_id">
                                  <option value="">Chọn danh mục</option>
                                                                  @foreach($listItem as $cate)
                                                                      <option value="{{$cate->id}}">{{$cate->name}}</option>
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
                          <div class="form-group">
                              <label for="">Trạng thái <span class="text-danger font-weight-bold">(*)</span></label>
                              <select class="form-control" id="" name="status">
                                  <option selected value="null" >Chọn trạng thái</option>
                                  <option value="1">Hiển thị</option>
                                  <option value="0">Ân bài viết</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="name">Author <span class="text-danger font-weight-bold">(*)</span></label>
                              <input class="form-control" type="text" name="author" id="name" value="{{old('author')}}">
                              @error('author')
                              <small class="text-danger form-text">{{$message}}</small>
                              @enderror
                          </div>
                          <button type="submit" class="btn btn-primary" name="btn_submit">Thêm mới</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
