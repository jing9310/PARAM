<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Passwords\CanResetPassword;
use App\Notifications\User\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    public function sport() {
        return $this->belongsTo('App\Models\Sport', 'sport_id', 'id');
    }

    public function place() {
        return $this->belongsTo('App\Models\Place', 'place_id', 'id');
    }

    public function content() {
        return $this->hasMany('App\Models\Content');
    }

    public function comment() {
        return $this->hasMany('App\Models\comment');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kana', 'nickname', 'gender', 'birthday', 'height', 'weight', 'active', 'place_id', 'sport_id', 'image',
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

    /**
    * パスワードリセット通知の送信
    *
    * @param  string  $token
    * @return void
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}