<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    
    public function doctor() {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function content() {
        return $this->belongsTo('App\Models\Content', 'content_id', 'id');
    }

    public function comment() {
        return $this->belongsTo('App\Models\Comment');
    }

    protected $fillable = [
        'reply_body', 
    ];
}
