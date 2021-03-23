<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('tin-tuc');
});



//Route::group([
//    'prefix' => 'laravel-filemanager',
//    'middleware' => ['web', 'auth']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});

Route::group([
    'prefix' => 'laravel-filemanager',
    ], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Auth::routes();
//TODO dang nhap bang google
Route::get('/login-google',function (){
    return Socialite::driver('Google')->redirect();
})->name('loginGoogle');

Route::get('/google-callback',[\App\Http\Controllers\Auth\SocialAuthController::class,'loginGoogleCallback'])->name('googleCallback');

//TODO đăng nhập bằng facebook
Route::get('/login-facebook',function(){
    return Socialite::driver('Facebook')->redirect();
})->name('loginFacebook');

Route::get('/facebook-callback',[\App\Http\Controllers\Auth\SocialAuthController::class,'loginFacebookCallback'])->name('facebookCallback');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('sendMail',[\App\Http\Controllers\MailController::class,'sendMail']);



Route::get('dang-nhap',[\App\Http\Controllers\SubmitController::class,'loginSubmit'])->name('login');
Route::post('dang-nhap',[\App\Http\Controllers\SubmitController::class,'login'])->name('login');


Route::get('dang-ky',[\App\Http\Controllers\SubmitController::class,'register'])->name('register');
Route::post('dang-ky',[\App\Http\Controllers\SubmitController::class,'registerSave'])->name('register');

Route::get('thoat',[\App\Http\Controllers\SubmitController::class,'logout'])->name('logout.logout');


Route::get('admin/dashboard',[\App\Http\Controllers\DashboarController::class,'index'])->middleware('CheckRole')->name('dashboard');
Route::get('stock/chart',[\App\Http\Controllers\PostChartController::class,'index'])->middleware('CheckRole');;



Route::get('/tin-tuc',[\App\Http\Controllers\NewLayOutController::class,'index']);
Route::get('/chi-tiet',[\App\Http\Controllers\NewLayOutController::class,'detail']);
//Route::get('/chi-tiet/{id}',[\App\Http\Controllers\NewLayOutController::class,'PostDetail'])->name('post.detail');
Route::get('/bai-viet-{id}-{slug?}',[\App\Http\Controllers\NewLayOutController::class,'PostDetail'])->name('post.detail');

Route::get('/lien-he',[\App\Http\Controllers\NewLayOutController::class,'contact']);
Route::post('/lien-he',[\App\Http\Controllers\NewLayOutController::class,'contactForm']);
Route::get('/logout',[\App\Http\Controllers\NewLayOutController::class,'logouts']);

Route::post('tin-tuc/api/tang-view', [\App\Http\Controllers\NewLayOutController::class, 'tangView'])
    ->name('post.tangView');

Route::post('tang-view', [\App\Http\Controllers\NewLayOutController::class, 'updatePostView'])
    ->name('post.updatePost');

Route::post('comment',[\App\Http\Controllers\NewLayOutController::class, 'Comment'])->name('post.comment');


Route::get('tin-tuc/search/',[\App\Http\Controllers\NewLayOutController::class, 'Search'])->name('post.search');

Route::get('danh-muc-tin-tuc-{id}-{slug?}',[\App\Http\Controllers\NewLayOutController::class,'catePost'])->name('cate.post');


