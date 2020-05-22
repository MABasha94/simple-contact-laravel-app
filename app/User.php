<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{


    public function phones()
    {
        return $this->hasMany('App\Phone');
    }


    public function contacts()
    {
        return $this->belongsToMany('App\User', 'contacts', 'user_id', 'contact_id');
    }


    public function contactwith()
    {
        return $this->belongsToMany('App\User', 'contacts', 'contact_id', 'user-id');
    }



    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
