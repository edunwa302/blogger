<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Article;
use App\comment;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get all of the tasks for the user.
     */
    public function articles()
    {
        // return $this->hasMany(Article::class);
        return $this->hasMany('App\Article');

    }

     /**
     * Get comments for user.
     */
    public function comments()
    {
        // return $this->hasMany(Article::class);
        return $this->hasMany('App\Comment');

    }
}
