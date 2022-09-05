<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foverite extends Model 
{

    protected $table = 'foverite';
    public $timestamps = true;
    protected $fillable = ['user_id','ads_id'];

    public function Ads()
    {
        return $this->belongsTo('App\Models\Ads', 'ads_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}