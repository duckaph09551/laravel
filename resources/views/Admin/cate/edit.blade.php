@extends('Admin.layout.main')
@section('page-title','Sửa danh mục')
@section('title',$title)
@section('content')
   <div class="container">
       <form action="{{route('cate.edit-save')}}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="form-group">
               <label for="exampleInputEmail1">Name <span class="text-danger font-weight-bold">(*)</span></label>
               <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ten" value="{{$cate->name}}">
               @error('name')
               <small class="text-danger form-text">{{$message}}</small>
               @enderror
           </div>
           <div class="form-group">
               <label for="images">Logo</label>
               <input class="form-control" type="file" name="logo" id="image" value="{{old('logo')}}">
               @error('logo')
               <small class="text-danger form-text">{{$message}}</small>
               @enderror
           </div>
           <div class="mb-3">
               <img style="width: 100px;height: 100px;" src="{{asset('public/uploads/')}}/{{$cate->logo}}" alt="">
               <input type="hidden" name="anh" value="{{$cate->logo}}">
           </div>
           <input type="hidden" name="id" value="{{$cate->id}}">
           <button type="submit" class="btn btn-primary mb-3">Submit</button>
       </form>
   </div>
@endsection
