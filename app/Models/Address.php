<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    protected $table = 'addresses';
    protected $fillable = [
    	'user_id',
    	'street',
      'address',
    	'house',
    	'level',
    	'flat',
    	'city_id',
    	];
    public $timestamps = true;
    
    public function user(){
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }
    
    public function city(){
        return $this->belongsTo(City::class,'city_id')->withDefault();
    }
    
    

}