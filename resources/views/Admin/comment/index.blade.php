@extends('Admin.layout.main')
@section('page-title','Danh sách bình luận')
@section('title','Comment')
@section('content')

    <div class="container-fluid">
        <div class="flash-message">
            @foreach (['danger', 'success'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
        <form action="{{route('comment.removeAll')}}"  method="post">
            @csrf
            <div class="m-3">
                <button name="btn-del" class="btn btn-danger" type="submit">Xóa tất cả</button>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">
                        <input name="checkall" type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Tên bài viết</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comment as $items)
                    <tr id="row-{{$items->id}}">
                        <td>
                            <input type="checkbox" name="ids[]" value="{{$items->id}} ">
                        </td>
                        <th scope="row">{{$items->id}}</th>
                        <td>{{$items->getUserName->name}}</td>
                        <td>{{$items->getPost->title}}</td>
                        <td>{{$items->content}}</td>
                        <td>
                            @if($items->status == 1)
                                <p class="btn btn-success">Hiển thị</p>
                            @else
                                <p class="btn btn-danger">Ân</p>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a href="{{route('comment.edit',['id'=>$items->id])}}" class="btn btn-success mr-1">Sua</a>
                            <a href="#"  id="delete-{{$items->id}}" onclick="dlts({{$items->id}})" class="btn btn-danger " >Xoa</a>
                        </td>
                    </tr>
                    <input type="hidden" name="id" value="{{$items->id}}">

                @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-lg-end">
                {{ $comment->links() }}
            </div>
        </form>
    </div>


@endsection

@section('page-script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script !src="">
        function dlts(id){
            swal({
                title: "Bạn có chắc muốn xóa",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        var deleteUri = 'remove' + "/" +id;
                        axios.delete(deleteUri)
                            .then(response => {
                                if(response.statusText == "OK"){
                                    var x = document.querySelector(".swal-button--confirm");
                                    x.addEventListener('click', function() {
                                        var removeElement = document.querySelector(('#row-'+ id));
                                        removeElement.remove();
                                    })
                                }
                            })
                        swal("Xóa dữ liệu thành công", {
                            icon: "success",
                        });
                    } else {
                        swal("Xóa dữ liệu thất bại");
                    }
                })



        }

    </script>

@endsection
