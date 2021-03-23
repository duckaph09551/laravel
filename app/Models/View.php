<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    protected $table = 'views';
    protected $fillable = ['post_id','view'];

    public function  getNamePost(){
        return $this->belongsTo(Post::class,'post_id');
    }


}
