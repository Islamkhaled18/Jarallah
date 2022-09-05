<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
    protected $table = 'citys';
    protected $guarded=[];
    public $timestamps = true;
    
    public function address(){
        return $this->hasOne(Address::class,'city_id');
    }
    

}