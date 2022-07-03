<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function doctor() {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function content() {
        return $this->belongsTo('App\Models\Content', 'content_id', 'id');
    }

    public function reply() {
        return $this->hasmany('App\Models\Reply');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Models\Reply');
    }

    protected $fillable = [
        'comment', 
    ];
}
