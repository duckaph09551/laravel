@extends('Admin.layout.main')
@section('page-title','Sửa quyền user')
@section('title',$listItem->name)
@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="container-fluid">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('user.edit-save')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{$listItem->id}}">
                            <div class="form-group">
                                <label for="">Quyền</label>
                                <select class="form-control" id="" name="role_id">
                                    <option @if($listItem->role_id == 1 )  {{"selected=\"selected\""}}   @endif value="1">Admin</option>
                                    <option @if($listItem->role_id == 2 )  {{"selected=\"selected\""}}   @endif value="2">Register</option>
                                    <option @if($listItem->role_id == 3 )  {{"selected=\"selected\""}}   @endif value="3">Author</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary" name="btn_submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
