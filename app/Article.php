<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Article extends Model
{
    //filleable
    protected $fillable = [
        'title', 'body', 'user_id'
    ];
    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // has relationship with comments
    public function comments()
     {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
     }
}
