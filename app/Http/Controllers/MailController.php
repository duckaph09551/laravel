<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function sendMail(){
        $data = [
            'title'=>'Tiêu đề mua hàng',
            'content' => 'Nội dung content'
        ];
//        Mail::to('duc2722000@gmail.com')->send(new DemoMail($data));
         Mail::to('duc2722000@gmail.com')->send(new TestMail($data));

    }
}
