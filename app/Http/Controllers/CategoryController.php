<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;

use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    function index(Request $request)
    {

//       dd(Auth::user()->role->name);
        if ($request->keyword) {
            $category = Category::where('name', 'like', "%" . $request->keyword . "%")->paginate(10);
            $category->withPath('?keyword=' . $request->keyword);
        } else {
            $category = Category::orderBy('id', 'desc')->paginate(10);

        }

        $category->load('post');

        return view('Admin.cate.index', ['cates' => $category, 'keyword' => $request->keyword]);
    }


    function removeAll(Request $request)
    {
        $id = $request->id;
        foreach ($id as $xoa) {
            Category::destroy($xoa);
        }
        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');
        return redirect(route('cate.index'));
    }

    function add()
    {

        return view('Admin.cate.add');
    }

    function addSave(CategoryRequest $request)
    {


        $cate = new Category();
        $cate->fill($request->all());

        if ($request->has('logo')){
            $images = $request->logo->getClientOriginalName();
            $request->logo->move('public/uploads',$images);
        }

        $cate->logo = $images;
        $cate->save();

        $request->session()->flash('alert-success', 'Thêm dữ liệu thành công');
        return redirect(route('cate.index'));;
    }


    function remove(Request $request, $id)
    {

        $model = Category::findOrFail($id);
        if ($model) {
            Post::where('cate_id', $id)->delete();
            $model->delete();
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
        }

//        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');

//        return redirect(route('cate.index'));

    }

    function edit($id)
    {
        $category_one = Category::findOrFail($id);
        $name = $category_one->name;
        return view('Admin.cate.edit', ['cate' => $category_one, 'title' => $name]);
    }


    function editSave(CategoryRequest $request)
    {
        $id = $request->id;
        $cate = Category::findOrFail($id);
        $cate->fill($request->all());

        $dir = 'public/uploads';

//       $size = $request->images->getSize();

        if($request->has('logo')  ){
            $filename = uniqid().$request->logo->getClientOriginalName();
            $request->logo->move($dir,$filename);
            $cate->logo = $filename;
        }else{
            $hinhcu = $request->anh;

            $filename = $hinhcu;
            $cate->logo = $filename;
        }
        $cate->save();
        $request->session()->flash('alert-success', 'Sửa dữ liệu thành công');
        return redirect(route('cate.index'));

    }

//    function read_delete(){
//       $cates = Category::onlyTrashed()->get();
//       return view('Admin.cate.rollback',['cates'=>$cates]);
//    }
//
//    function restore(Request $request,$id){
//        Category::onlyTrashed()->where('id',$id)->restore();
//        $request->session()->flash('alert-success', 'Khôi phục dữ liệu thành công');
//        return redirect(route('cate.index'));
//    }
//
//
//    function permanterlyDelete(Request $request, $id)
//    {
//        Category::onlyTrashed()->where('id', $id)->forceDelete();
//        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');
//        return redirect(route('cate.index'));
//
//    }
}
