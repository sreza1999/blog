<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{


    protected $fillable = [
        'post_id'
        , 'author'
        , 'email'
        , 'body'
        , 'is_active'
        ,'photo'
    ];

    public function commentReplies()
    {
        return $this->hasMany('App\CommentReplies');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
