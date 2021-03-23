<?php

namespace App\Http\Controllers;

use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostChartController extends Controller
{
    //
   function index(){

//       $dauthangnay = Carbon::now()->startOfMonth()->toDateString();
//       $dauthangtruoc = Carbon::now()->subMonth()->toDateString();
//       $cuoithangtruoc = Carbon::now()->subMonth()->endOfMonth()->toDateString();
//
//       $sub7ngay = Carbon::now()->subDay(7)->toDateString();
//       $now = Carbon::now()->toDateString();
//       $dauthangnay = Carbon::now()->startOfMonth()->toDateString();
//       $dauthangtruoc = Carbon::now()->subMonth()->toDateString();
//       $cuoithangtruoc = Carbon::now()->subMonth()->endOfMonth()->toDateString();
//
//       $sub7ngay = Carbon::now()->subDay(7)->toDateString();
//       $now = Carbon::now()->toDateString();



       $postViewDay = View::select(DB::raw('post.title,views.post_id,SUM(view) as count'))
           ->join('post', 'views.post_id', '=', 'post.id')
           ->groupBy('post_id','title')
           ->where('views.created_at', '>=', Carbon::today()->format('Y-m-d'). " 00:00:00")
           ->where('views.created_at', '<=', Carbon::today()->format('Y-m-d'). " 23:59:59")
//           ->orderBy('count','desc')
           ->get();




       return response()->json($postViewDay);
   }
}
