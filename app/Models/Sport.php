<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['sport_name',];

    public $timestamps = false;

    public function user() {
        return $this->hasMany('App\Models\User');
    }
    public function doctor() {
        return $this->hasMany('App\Models\Doctor');
    }
}
