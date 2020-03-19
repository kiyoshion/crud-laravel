<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // public function likes()
    // {
    //     return $this->hasMany('App\Like');
    // }

    // public function likePosts()
    // {
    //     return $this->belongsToMany('App\Like');
    // }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamps();
    }

    public function like($postId)
    {
        $exist = $this->is_like($postId);
        if ($exist) {
            return false;
        } else {
            $this->likes()->attach($postId);
            return true;
        }
    }

    public function unlike($postId)
    {
        $exist = $this->is_like($postId);
        if ($exist) {
            $this->likes()->detach($postId);
            return true;
        } else {
            return false;
        }
    }

    public function is_like($postId)
    {
        return $this->likes()->where('post_id', $postId)->exists();
    }
}
