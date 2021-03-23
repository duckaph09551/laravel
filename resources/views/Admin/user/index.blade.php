@extends('Admin.layout.main')
@section('page-title','Danh sách user')
@section('title','User')
@section('content')

    <div class="container">
        <form method="get">
            <div class="d-flex justify-content-end">
                <div class="col-md-4 ">
                    <div class="form-group">
                        <input type="text" name="keyword" id="search" class="form-control" placeholder="Tìm kiếm" value="{{$keyword}}">
                    </div>
                </div>
            </div>
        </form>
        <div class="flash-message">
            @foreach (['danger', 'success'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
        <form action="{{route('user.removeAll')}}"  method="post">
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hoạt động</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $items)
                    <tr id="row-{{$items->id}}">
                        <td>
                            <input type="checkbox" name="id[]" value="{{$items->id}} ">
                        </td>


                        <th scope="row">{{$items->id}}</th>
                        <td>{{$items->name}}</td>
                        <td>{{$items->email}}</td>
                        <td>
                            @if($items->role_id == 1)
                                <p class="btn btn-success">Admin</p>
                            @elseif($items->role_id==2)
                                <p class="btn btn-danger">Register</p>
                            @else
                                <p class="btn btn-warning">Author</p>
                            @endif
                        </td>
                        <td>
                            @if(Cache::has('user-is-online-' .$items->id))
                                <span class="text-success"><i class="fa fa-user fa-fw"></i>Online</span>
                            @else
                                <span class="text-danger"><i class="fa fa-user fa-fw"></i>Offline</span>
                            @endif
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($items->last_seen)->diffForHumans() }}
                        </td>
                        <td>
                            <a href="{{route('user.edit',['id'=>$items->id])}}" class="btn btn-success">Sua</a>
                            <a href="#"  id="delete-{{$items->id}}" onclick="dlt({{$items->id}})" class="btn btn-danger " >Xoa</a>
                        </td>
                    </tr>
                    <input type="hidden" name="id" value="{{$items->id}}">

                @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-lg-end">
                {{ $users->links() }}
            </div>
        </form>
    </div>


@endsection

@section('page-script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script !src="">
        function dlt(id){
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
