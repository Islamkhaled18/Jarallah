<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_Us extends Model {

    protected $table = 'about_us';
    protected $fillable = [
      'aboutus_ar',
      'aboutus_en',
      'logo_aboutus',
    ];


}
