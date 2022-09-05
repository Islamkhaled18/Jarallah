<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
     protected $table = 'comments';
     protected $fillable = ['msg','user_id', 'ads_id','rate'];

     public function User()
    {
        return $this->belongsTO('App\Models\User','user_id');
    }
     public function Ads()
    {
        return $this->belongsTO('App\Models\Ads','ads_id');
    }
}
