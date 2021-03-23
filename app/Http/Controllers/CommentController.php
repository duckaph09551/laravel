<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    function index(Request $request)
    {
        $comment = Comment::orderBy('id', 'desc')->paginate(10);
        $comment->load('getUserName','getPost');
        return view('Admin.comment.index', ['comment' => $comment]);

    }


    function edit($id){
        $listItem = Comment::find($id);

        return view('Admin.comment.edit',['listItem'=>$listItem ]);
    }


    function editSave(Request $request){
//          dd($request->images->getRealPath());

        $id = $request->id;
        $product = Comment::find($id);
        $product->fill($request->all());
        $product->save();
        $request->session()->flash('alert-success', 'Sửa dữ liệu thành công');

        return redirect(route('comment.index'));
    }


    function remove(Request $request,$id){
        $model = Comment::findOrFail($id);

        if ($model){
            $model->delete();

            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);

        }


    }

    public function  removeAll(Request $request){
        $ids = $request->ids;

        foreach ($ids as $xoa){
            Comment::destroy($xoa);
        }
        $request->session()->flash('alert-danger','Xóa dữ liệu thành công');
        return redirect(route('comment.index'));
    }


}
