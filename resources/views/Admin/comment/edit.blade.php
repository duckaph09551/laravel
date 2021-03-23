@extends('Admin.layout.main')
@section('page-title','Ân hiện comment bài viết')
@section('title',$listItem->name)
@section('content')
    <div class="container">
        <div class="row">
            <div id="content" class="container-fluid">
                <div class="card">

                    <div class="card-body">
                        <form action="{{route('comment.edit-save')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="id" value="{{$listItem->id}}">
                            <div class="form-group">
                                <label for="">Ân / hiện comment</label>
                                <select class="form-control" id="" name="status">
                                    <option @if($listItem->status == 1 )  {{"selected=\"selected\""}}   @endif value="1">Hiện</option>
                                    <option @if($listItem->status == 0 )  {{"selected=\"selected\""}}   @endif value="0">Ân</option>

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
