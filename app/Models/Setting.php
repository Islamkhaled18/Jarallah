<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
    protected $table = 'settings';
    protected $fillable = [
      'name_ar',
      'name_en',
      'who_we_ar',
      'who_we_en',
      'who_we_video',
      'link_facebook',
    	'link_instagram',
      'site_state',
      'message_state_ar',
      'message_state_en',
      'commission_agreement',
      'conditions_ar',
      'conditions_en',
      'address_ar',
      'address_en',
      'privacy_policy_ar',
      'privacy_policy_en',
      'image',
    ];
}
