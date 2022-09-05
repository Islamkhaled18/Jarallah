<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car_Type extends Model {
    protected $table = 'cars_type';
    public $timestamps = true;
    protected $fillable = ['name_ar', 'name_en', 'image'];

    public function Car_Model()
  {
     return $this->hasMany('App\Models\Car_Model');
  }


}
