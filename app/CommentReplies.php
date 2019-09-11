<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplies extends Model
{
    protected $fillable = [
        'comment_id'
        , 'author'
        , 'email'
        , 'body'
        , 'is_active'
        , 'photo'

    ];

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
}
