<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body', 'post_id',
    ];

    public function post()
    {
        return $this->belognsTo('App\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
