@extends('Admin.layout.main')
@section('page-title','Danh sách đã xóa')
@section('title','Dánh sách đã xóa')

@section('content')
<div class="container">
{{--    <a href="{{route('cate.index')}}" class="btn btn-success p-1">Trang chu</a>--}}
    <div class="flash-message">
        @foreach (['danger', 'success'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $items)
            <tr>
                <th scope="row">{{$items->id}}</th>
                <td>{{$items->name}}</td>
                <td>{{$items->email}}</td>
                <td>
                    <a href="{{route('user.restore',['id'=>$items->id])}}" class="btn btn-success" onclick="return confirm('Bạn có chắc muốn Khô phục không')">Khôi phục</a>
                    <a href="{{route('user.permanterlyDelete',['id'=>$items->id])}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không')">Xoa vinh vien</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
@endsection
