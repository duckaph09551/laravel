<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    //

    public function loginGoogleCallback(Request $request){
        $google_user = Socialite::driver('google')->stateless()->user();
        if (!$google_user){
            return 'Cant not authenticate';
        }
        $systemUser = User::where('google_id',$google_user['id'])->get()->first();

        if ($systemUser){
            //da co tren he thong
           Auth::loginUsingId($systemUser['id']);
            return redirect('/admin/dashboard');

        }else{
            //chua dang ki
            $newUser = User::Create([
                'name'=> $google_user->name,
                'email'=>$google_user->email,
                'google_id'=>$google_user->id
            ]);
            $systemUser = User::where('google_id',$google_user['id'])->get()->first();
//            dd($systemUser);
            Auth::loginUsingId($systemUser->id);
            return redirect('/tin-tuc');

//            return  redirect('/dang-nhap');
        }
    }


    public function loginFacebookCallback(Request $request){
        $facebook_user = Socialite::driver('facebook')->stateless()->user();
//        dd($facebook_user);

        if (!$facebook_user){
            return 'Cant not authenticate';
        }

        $systemUser = User::where('facebook_id',$facebook_user['id'])->get()->first();


        if ($systemUser){
            //da co tren he thong
            Auth::loginUsingId($systemUser['id']);
            return redirect('/admin/dashboard');


        }else{
            //chua dang ki
            $newUser = User::Create([
                'name'=> $facebook_user->name,
                'email'=>$facebook_user->email,
                'facebook_id'=>$facebook_user->id
            ]);

            $systemUser = User::where('facebook_id',$facebook_user['id'])->get()->first();
            Auth::loginUsingId($systemUser->id);
            return redirect('/tin-tuc');
//            return  redirect('/dang-nhap');
        }
    }

}
