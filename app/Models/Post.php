<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\View;

class Post extends Model
{
    use HasFactory;
    protected  $table = 'post';
    protected $fillable = ['title','cate_id','content','short_desc','images','author','status','user_id'];

    public function getCateName(){
        return $this->belongsTo(Category::Class,'cate_id');
    }

    public function getView(){
        return $this->hasMany(\App\Models\View::class,'post_id')->orderBy('view','desc');;
    }

    function userPost(){
        return $this->belongsToMany(User::class,'post');
    }


}
