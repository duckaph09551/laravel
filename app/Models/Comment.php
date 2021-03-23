<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['user_id','post_id','content','status'];

    public function getUserName(){
        return $this->belongsTo(User::Class,'user_id');
    }

    public function getPost(){
        return $this->belongsTo(Post::Class,'post_id');
    }


}
