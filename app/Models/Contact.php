<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {
    protected $table = 'contact';
    protected $fillable = [
    	'user_name',
    	'email',
      'phone',
    	'message',
    	'view',
    	];
    public $timestamps = true;

}
