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
        return $this->hasMany(Post::class);
    }
        public function loadRelationshipCounts()
    {
        $this->loadCount('posts');
    }
    
        public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorite', 'user_id', 'post_id')->withTimestamps();
    }
        public function favorite($PostId)
    {
        $exist = $this->is_favoriting($PostId);
        $its_me = $this->id == $PostId;

        if ($exist || $its_me) {
            return false;
        } else {
            $this->favorites()->attach($PostId);
            return true;
        }
    }
        public function unfavorite($PostId)
    {
        $exist = $this->is_favoriting($PostId);
        $its_me = $this->id == $PostId;

        if ($exist && !$its_me) {
            $this->favorites()->detach($PostId);
            return true;
        } else {
            return false;
        }
    }
        public function is_favoriting($PostId)
    {
        return $this->favorites()->where('post_id', $PostId)->exists();
    }
}
