<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'phone', 'email', 'image',  'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function City() {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }
    
    protected $appends = ['image_path'];

    public function getImagePathAttribute(){
        return asset('storage/' . $this->image);
    }
    
    public function wishlist()
    {
        return $this->belongsToMany(Ads::class, 'wishlists')->withTimestamps();
    }//relation between ads & user with the midle table (wishlists) to get the user with his wighlist


    public function wishlistHas($productId)
    {
        return self::wishlist()->where('ads_id', $productId)->exists();
    }//to prevent store the product more than one 
    
    public function comments(){
        return $this->hasMany(User::class,'user_id');
    }
    public function addresses(){
        return $this->hasMany(Address::class,'user_id');
    }
}
