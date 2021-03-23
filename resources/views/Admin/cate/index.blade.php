@extends('Admin.layout.main')
@section('page-title','Danh sách danh mục')
@section('title','Danh mục')
@section('content')

<div class="container">
    <form action="" method="get">
       <div class="d-flex justify-content-end">
           <div class="col-md-4 ">
               <div class="form-group">
                   <input type="text" name="keyword" id="search" class="form-control" placeholder="Tìm kiếm" value="{{$keyword}}">
               </div>
           </div>
       </div>
    </form>

    <form action="{{route('cate.removeAll')}}" method="post">
        @csrf
        <div class="m-3">
            <button name="btn-del" class="btn btn-danger" type="submit">Xóa tất cả</button>
        </div>


    <div class="flash-message">
        @foreach (['danger', 'success'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>


    {{--    <a href="{{route('cate.add')}}" class="btn btn-success m-3">Thêm mới</a>--}}
{{--    <a href="{{route('cate.read_delete')}}" class="btn btn-danger m-3">Danh sách danh mục đã xóa</a>--}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">
                <input name="checkall" type="checkbox" id="checkAll">
            </th>
            <th scope="col">#</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Logo</th>
            <th scope="col">Tổng số bài viết</th>
           @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                <th scope="col">ACTION</th>
            @endif
        </tr>
        </thead>
        <tbody>
      @foreach($cates as $items)
          <tr id="row-{{$items->id}}">
              <td>
                  <input type="checkbox" name="id[]" value="{{$items->id}} ">
              </td>


              <th scope="row">{{$items->id}}</th>
              <td>{{$items->name}}</td>
              <td>
                  <img style="width: 50px ; height: 50px; object-fit: cover" src="{{asset('public/uploads/')}}/{{$items->logo}}" alt="" >
              </td>
              <td>{{count($items->post)}}</td>
              @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
               <td>
                   <a href="{{route('cate.edit',['id'=>$items->id])}}" class="btn btn-success">Sua</a>
{{--                   <a href="{{route('cate.remove',['id'=>$items->id])}}" data-url="{{route('cate.remove',['id'=>$items->id])}}"  id="delete" class="btn btn-danger " onclick="return confirm('Bạn có chắc muốn xóa không')">Xoa</a>--}}
                   <a href="#" data-url="{{route('cate.remove',['id'=>$items->id])}}" onclick="dlt({{$items->id}})"  id="delete-{{$items->id}}" class="btn btn-danger " >Xoa</a>
               </td>
{{--                  <input type="hidden" name="id" value="{{$items->id}}">--}}
              @endif
          </tr>
      @endforeach
        </tbody>
    </table>
     <div class="d-flex justify-content-lg-end">
         {{ $cates->links() }}
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
                        var deleteUri = 'danh-muc/remove' + "/" +id;
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
