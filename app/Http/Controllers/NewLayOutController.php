<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Mail\TestMail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewLayOutController extends Controller
{
    //

    function index(){
        $x = Category::all();


        //TODO tin mới nhất trong ngày
        $postsNew = Post::orderBy('id', 'desc')
            ->whereDate('created_at', Carbon::today())
                           ->where('status',1)
                          ->get();
//        ->paginate(6);




        //TODO tin gần đây nhất trong 1 tuần qua
        $date = Carbon::today()->subDay(7);
       $postWeek = Post::orderBy('id', 'desc')
           ->where('created_at','>=',$date)
           ->where('created_at','<',Carbon::today())
           ->where('status',1)
//           ->take(10)
//           ->get();

           ->paginate(6);
//             dd($postWeek);




        //TODO tin có lượt xem nhiều nhất trong 2 ngày
//        dd(Carbon::today()->subDay(2));
        $postViewTwoDay = View::select(DB::raw('post_id,SUM(view) as count'))
            ->join('post', 'views.post_id', '=', 'post.id')
            ->groupBy('post_id')
            ->where('views.created_at','>=',Carbon::today()->subDay(2))
            ->where('views.created_at','<',Carbon::today())
            ->orderBy('count','desc')
            ->take(9)
            ->get();
//            ->paginate(6);
//        dd($postViewTwoDay);

        $postViewTwoDay->load('getNamePost');

         $postAll = Post::all();

        return view('News.index',[
             'x'=>$x,
            'postNew'=>$postsNew,
            'postWeek'=>$postWeek,
            'postViewTwoDay'=>$postViewTwoDay,
            'postAll'=>$postAll

        ]);
    }

    function detail(){

        return view('News.detail');
    }

    function postDetail(Request $request,$id){
        $x = Category::all();

          $detail = Post::findOrFail($id);
          //insert view

          $relatedNew = Post::where('cate_id',$detail->cate_id)->get();
//          dd($relatedNew);
        $totalViews = View::where('post_id', $id)->sum('view');
//        dd($totalViews);

        return view('News.detail',[
            'x'=>$x,
            'detail'=>$detail,
            'relatedNew'=>$relatedNew,
            'totalView'=>$totalViews
        ]);
    }

    function contact(){

        return view('News.contact');
    }

    function contactForm(ContactRequest $request){
        $data = [
            'username'=>$request->username,
            'email'=>$request->email,
            'title'=>$request->title,
            'contents'=>$request->contents
        ];
        Mail::to('duc2722000@gmail.com')->send(new ContactMail($data));
        $request->session()->flash('alert-success', 'Gửi phản hồi thành công');
        return redirect('lien-he');
    }

    function logouts(){
        Auth::logout();
        return redirect()->back();
    }



    public function tangView(Request $request){
//        $post = View::where('post_id',$request->id)->get();
//        if ($post){
//            foreach ($post as $post){
//                $post->view += 1;
//                $post->save();
//            }
//            return response()->json($post);
//        }


        $today = Carbon::yesterday()->format('Y-m-d');

        $productView = View::where('post_id', $request->id)
            ->where('created_at', '>=', $today . " 00:00:00")
            ->where('created_at', '<=', $today . " 23:59:59")
            ->first();
//        dd($productView);
        if($productView){
            $productView->view += 1;
        }else{
            $productView = new View();
            $productView->post_id = $request->id;
            $productView->view = 1;
        }
        $productView->save();
        return response()->json($productView);

    }



    function Comment(CommentRequest $request){
          Comment::create([
//              'status'=>$request->status,
              'status'=>1,
              'content'=>$request->contents,
              'user_id'=>$request->user_id,
              'post_id'=>$request->post_id
          ]);
          return redirect()->back();
//        $comment = Comment::all();
//        return response()->json($comment);

    }


    public function Search(Request  $request){

        if (isset($request->keyword)) {
            $post = Post::where('title', 'like', "%" . $request->keyword . "%")
                ->where('status',1)

                ->paginate(10);
            $post->withPath('?keyword=' . $request->keyword);
        }
        if ($request->keyword == ""){
            return  redirect('tin-tuc');
        }
        return view('News.search', ['post' => $post, 'keyword' => $request->keyword]);
    }


    public  function  catePost($id){
        $list_post = Post::where('cate_id',$id)->orderBy('id','desc')->paginate(12);

        $title = Category::where('id',$id)->first();
//        dd($title);


       return view('News.list-cate-post',[
           'cateName'=>$title,
           'list_post'=>$list_post
       ]);
    }

}
