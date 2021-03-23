<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubmitController extends Controller
{
    //
//    protected function authenticated()
//    {
//        //
//        Auth::logoutOtherDevices(request('password'));
//    }



    public function loginSubmit(){
        return view('User.login');
    }

    public function login(LoginRequest  $request){
        {
            $credentials = $request->only('name', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin/dashboard');
//                return  redirect()->back();

            }else{
                $request->session()->flash('xyz','Tài khoản của bạn đã bị vô hiệu hóa');
                return redirect()->intended('dang-nhap');
            };
            return view('User.login', [
                'msg' => "Tài khoản/mật khẩu không đúng!"
            ]);

        }
    }

    public function logout(){
        Auth::logout();
//        return redirect('dang-nhap');
        return  redirect()->back();
    }


    public function  register(){
        return view('User.register');
    }

    public function registerSave(RegisterRequest $request){
        $user = new User();
        $user->fill($request->except('password_confirmation'));
        $user->password = Hash::make($request->password);
        $user->save();
        $request->session()->flash('alert-success', 'Đăng kí tài khoản thành công ');
        return redirect(route('login'));
    }
}
