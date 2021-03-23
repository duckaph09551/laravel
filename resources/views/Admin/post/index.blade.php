@extends('Admin.layout.main')
@section('page-title','Danh sách bài viết')
@section('title','Bài viết')
@section('content')
    <div class="container">
        <form action="" method="get">
            <div class="d-flex justify-content-end">
                <div class="col-md-4 ">
                    <div class="form-group">
                        <input type="text" name="keyword" id="" class="form-control" placeholder="Tìm kiếm"
                               value="{{$keyword}}">
                    </div>
                </div>
            </div>
        </form>
        <form action="{{route('post.removeAll')}}" method="post">
            <div class="m-3">
                <button name="btn-del" class="btn btn-danger" type="submit">Xóa tất cả</button>
            </div>

             @if(\Illuminate\Support\Facades\Auth::user()->role_id == "1")
                <div class="text-right">
                    <div class="analytic d-flex justify-content-end mb-3">
                        <a href="" class="text-primary">Hiển thị : <span class="text-muted">({{$display}})</span></a>
                        <a href="" class="text-primary">Ân bài viết : <span class="text-muted">({{$hide}})</span></a>

                    </div>
{{--                    <div class="form-action form-inline py-3 d-flex justify-content-end">--}}
{{--                        <select class="form-control mr-1" id="">--}}
{{--                            <option>Chọn</option>--}}
{{--                            <option>Tác vụ 1</option>--}}
{{--                            <option>Tác vụ 2</option>--}}
{{--                        </select>--}}
{{--                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">--}}
{{--                    </div>--}}
                </div>
            @endif

            <div class="flash-message">
                @foreach (['danger', 'success'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
                                                                                                 data-dismiss="alert"
                                                                                                 aria-label="close">&times;</a>
                        </p>
                    @endif
                @endforeach
            </div>


            {{--    <a href="{{route('cate.add')}}" class="btn btn-success m-3">Thêm mới</a>--}}
            {{--    <a href="{{route('cate.read_delete')}}" class="btn btn-danger m-3">Danh sách danh mục đã xóa</a>--}}
            <table class="table table-striped">
                <thead>
                <tr >
                    <th scope="col">
                        <input name="checkall" type="checkbox" id="checkAll">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Danh mục bài viết</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Lượt view</th>
                    {{--                <th scope="col">Short_desc</th>--}}
                    <th scope="col">Trạng thái</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($product as $items)

                    <tr id="row-{{$items->id}}">

                        <td>
                            <input type="checkbox" name="id[]" value="{{$items->id}} ">
                        </td>
                        {{--                    <th scope="row">{{$loop->iteration}}</th>--}}
                        <th scope="row">{{$items->id}}</th>
                        <td style="width: 219px;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 20px;
    -webkit-line-clamp: 3;
    display: -webkit-box;
    -webkit-box-orient: vertical;">{{$items->title}}</td>
                        <td style="width: 160px;">{{($items->getCateName->name)}}</td>
                        <td>
{{--                            <img class="img-fluid" src="{{asset('public/uploads/')."/".$items->images}}" alt=""--}}
{{--                                 style="width: 100px;height: 100px;">--}}
                            @if(strcasecmp(substr($items->images,0,5),'https') == 0)
                                <img src="{{$items->images}}" class="img-fluid" alt="..."  style="width: 100px;height: 100px;">

                            @else
                                <img src="{{asset('public/uploads/')."/".$items->images}}" class="img-fluid" alt="...">
                            @endif
                        </td>
                        {{--                    <td>{!! $items->content !!}</td>--}}
                        <td style="width: 100px;">{{$items->author}}</td>
                        <td>
{{--                            @foreach($items->getView as $k)--}}
{{--                           --}}
{{--                                {{$k->view}}--}}
{{--                            @endforeach--}}

                            {{count($items->getView)}}
                        </td>
                        <td>
                            @if($items->status == 1)
                                <p class="btn btn-success">Hiển thị</p>
                            @else
                                <p class="btn btn-danger">Ân bài viết</p>
                            @endif
                        </td>

                        <td>
                            <a href="{{route('post.edit',['id'=>$items->id])}}" class="btn btn-success">Sua</a>
                            <a href="#" class="btn btn-danger" onclick="dlt({{$items->id}})"  id="delete-{{$items->id}}"
                              >Xoa</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </form>
        <div class="d-flex justify-content-lg-end">
            {{ $product->links() }}
        </div>

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
                        var deleteUri = 'bai-viet/remove' + "/" +id;
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
