<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    // belongs to article
    public function articles()
        {
            return $this->belongsTo('App\Article');
        }

        public function user()
        {
            return $this->belongsTo('App\User');
        }

}
