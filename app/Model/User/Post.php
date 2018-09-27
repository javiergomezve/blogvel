<?php

namespace App\Model\User;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
    	return $this->belongsToMany(Tag::class,'post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getSlugAttribute($value)
    {
        return route('post', $value);
    }
}
