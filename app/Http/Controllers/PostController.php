<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    function  index(Request  $request){

       if (Auth::user()->role_id == "1"){
           if($request->keyword){
               $product = Post::where('title','like',"%".$request->keyword."%")->paginate(10);
               $product->withPath('?keyword='.$request->keyword);
           }else{
               $product = Post::orderBy('id','desc')->paginate(10);

           }


           $product->load('getCateName','getView');

           // hieent thi trang thai
           $display = Post::where('status',1)->get();
            $dp = count($display);

           $hide = Post::where('status',0)->get();
           $hd = count($hide);

           return view('Admin.post.index',[
               'product'=>$product,
               'keyword'=>$request->keyword,
               'display'=>$dp,
               'hide'=>$hd
           ]);


       }elseif (Auth::user()->role_id == "3"){
//            $product = Post::where('user_id',Auth::user()->id)->get();

           if($request->keyword){

               $product = Post::where('user_id',Auth::user()->id);

               $product = $product->where('title','like',"%".$request->keyword."%")->paginate(10);

//
//               $product = Post::where('title','like',"%".$request->keyword."%")
//                              ->orWhere('user_id',Auth::user()->id)
//                            ->paginate(10);
               $product->withPath('?keyword='.$request->keyword);
           }else{
               $product = Post::where('user_id',Auth::user()->id)->paginate(10);

           }


           $product->load('getCateName','getView');

           return view('Admin.post.index',['product'=>$product,'keyword'=>$request->keyword]);

       }


    }



    function add(){
        $category = Category::all();
        return view('Admin.post.add',['listItem'=>$category]);
    }

    function addSave(PostRequest $request){
//        dd($request->all());

        $post = new Post();
        $post->fill($request->all());
        if($request->has('images')){
            $images = $request->images->getClientOriginalName();
            $request->images->move('public/uploads',$images);
        }
        $post->images = $images;
        $post->save();

//        $xview = Post::orderBy('created_at','desc')->first();
//        View::create([
//            'post_id'=>$xview->id,
//            'view'=>0
//        ]);

        $request->session()->flash('alert-success', 'Thêm dữ liệu thành công');
        return redirect(route('post.index'));;
    }

    function edit($id){
        $listItem = Post::find($id);
        $cate = Category::all();
        return view('Admin.post.edit',['listItem'=>$listItem , 'cate'=>$cate]);
    }


    function editSave(PostRequest $request){
//          dd($request->images->getRealPath());

        $id = $request->id;
        $product = Post::find($id);
        $product->fill($request->all());


        $dir = 'public/uploads';

//       $size = $request->images->getSize();

        if($request->has('images')  ){
            $filename = uniqid().$request->images->getClientOriginalName();
            $request->images->move($dir,$filename);
            $product->images = $filename;
        }else{
            $hinhcu = $request->anh;

            $filename = $hinhcu;
            $product->images = $filename;
        }
//        dd($filename);
        $product->save();
        $request->session()->flash('alert-success', 'Sửa dữ liệu thành công');

        return redirect(route('post.index'));
    }


    function remove(Request $request , $id){
        Post::find($id)->delete();
        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');

//        return redirect(route('post.index'));
        return response()->json([
            'success'=>'xóa thành công'
        ]);
    }


    function removeAll(Request $request){
        $id = $request->id;
        foreach ($id as $xoa){
            Post::destroy($xoa);
        }
        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');
        return redirect(route('post.index'));
    }
}
