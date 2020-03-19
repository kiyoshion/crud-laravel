<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likesCount()
    {
        // return $this->hasMany('App\Like');
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }

    public function like_by()
    {
        return Like::where('user_id', \Auth::user()->id)->first();
    }
}
