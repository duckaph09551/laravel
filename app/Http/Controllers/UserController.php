<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\Restore;
use App\Mail\TestMail;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    function index(Request $request)
    {


        if ($request->keyword) {
            $users = User::where('name', 'like', "%" . $request->keyword . "%")->paginate(10);
            $users->withPath('?keyword=' . $request->keyword);
        } else {
            $users = User::orderBy('id', 'desc')->paginate(10);

        }

        return view('Admin.user.index', ['users' => $users, 'keyword' => $request->keyword]);
    }


    function edit($id){
        $listItem = User::find($id);

        return view('Admin.user.edit',['listItem'=>$listItem ]);
    }


    function editSave(Request $request){
//          dd($request->images->getRealPath());

        $id = $request->id;
        $product = User::find($id);
        $product->fill($request->all());
        $product->save();
        $request->session()->flash('alert-success', 'Sửa dữ liệu thành công');

        return redirect(route('user.index'));
    }


    function remove(Request $request,$id){
        $model = User::findOrFail($id);

        if ($model){
            $model->delete();

            //gửi mail thông báo đã xóa tài khoản
            $data = [
                'name'=>$model->name,
                'email'=>$model->email,
                'title'=>'Xóa tài khoản',
            ];
            return response()->json([
                'success' => 'Record has been deleted successfully!'
            ]);
            Mail::to($model->email)->send(new TestMail($data));

        }
//        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');
//
//        return redirect(route('user.index'));

    }

    public function  removeAll(Request $request){
         $id = $request->id;
         foreach ($id as $xoa){
             User::destroy($xoa);
         }
         $request->session()->flash('alert-danger','Xóa dữ liệu thành công');
         return redirect(route('user.index'));
    }


    public function read_delete(){
         $user = User::onlyTrashed()->get();
         return view('Admin.user.rollback',['user'=>$user]);
    }

    public function restore(Request $request,$id){
        $x =  User::onlyTrashed()->where('id',$id)->restore();

        $y = User::find($id);

        $request->session()->flash('alert-success', 'Khôi phục dữ liệu thành công');
        $data = [
            'name'=>$y->name,
            'email'=>$y->email,
            'title'=>'Khôi phục tài khoản',
        ];
        Mail::to($y->email)->send(new Restore($data));
        return redirect(route('user.index'));
    }


public function permanterlyDelete(Request $request, $id)
    {
        User::onlyTrashed()->where('id', $id)->forceDelete();
        $request->session()->flash('alert-danger', 'Xóa dữ liệu thành công');
        return redirect(route('user.index'));

    }




}
