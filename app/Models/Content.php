<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function reply() {
        return $this->hasMany('App\Models\Reply');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'del_flg'
    ];
}
