<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{

    protected $table = 'ads';
    public $timestamps = true;
    protected $fillable = [
      'name_ar',
      'name_en',
      'car_type_id',
      'car_model',
      'piece_number',
      'offers',
      'price',
      'ads_type',
      'description_ar',
      'description_en',
      'view_count',
      'user_id',
      ];

    public function User() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }


    public function Car_Type() {
        return $this->belongsTo('App\Models\Car_Type', 'car_type_id');
    }


    public function Year() {
        return $this->belongsTo('App\Models\Year', 'year_id');
    }


    public function Foverite() {
        return $this->hasMany('App\Models\Foverite', 'ads_id');
    }


    public function Rating() {
        return $this->hasMany('App\Models\User', 'ads_id');
    }

     public function comments()
    {
        return $this->hasMany('App\Models\Comment','ads_id');
    }

    public function Images() {
        return $this->hasMany('App\Models\Image', 'ads_id');
    }

}
