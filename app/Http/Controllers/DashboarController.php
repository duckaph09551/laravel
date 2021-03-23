<?php

namespace App\Http\Controllers;


use App\Charts\UserChart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class DashboarController extends Controller
{
    //

    public function index(){
        $category = Category::all()->count();
        $post = Post::all()->count();
        $user = User::all()->count();
        $comment = Comment::all()->count();

        return view('Admin.dashboard.index',[
            'category'=>$category,
            'post'=>$post,
            'user'=>$user,
            'comment'=>$comment,

        ]);
    }
}
