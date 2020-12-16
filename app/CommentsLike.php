<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsLike extends Model
{
    //
   protected $fillable = ['comment_id','article_id','user_id'];

}
