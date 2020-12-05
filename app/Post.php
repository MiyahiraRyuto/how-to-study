<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable=['content','title'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorite', 'post_id', 'user_id')->withTimestamps();
    }
}