<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\Doctor\ResetPassword;

class Doctor extends Authenticatable
{
    use Notifiable;

    public function sport() {
        return $this->belongsTo('App\Models\Sport');
    }

    public function place() {
        return $this->belongsTo('App\Models\Place');
    }

    public function reply() {
        return $this->hasMany('App\Models\Reply', 'user_id', 'id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kana', 'nickname', 'gender', 'birthday', 'specialty', 'doctors_history', 'self_introduction', 'place_id', 'sport_id', 'image',
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

    public function sendPasswordResetNotification($token)
    {

        $this->notify(new ResetPassword($token));

    }
}
