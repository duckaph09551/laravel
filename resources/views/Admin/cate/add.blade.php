@extends('Admin.layout.main')
@section('page-title','Thêm danh mục')
@section('content')
<div class="container">
    <form action="{{route('cate.add-save')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name <span class="text-danger font-weight-bold">(*)</span></label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ten">
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
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('cate.index')}}" class="btn  btn-warning">Hủy</a>
    </form>
</div>
@endsection
