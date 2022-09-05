<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';
    public $timestamps = true;
    protected $fillable = ['image', 'ads_id'];

    public function Ads()
    {
        return $this->belongsTo('App\Model\Ads', 'ads_id');
    }

}
