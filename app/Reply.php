<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	protected $guarded = [];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

	public function likes()
	{
		return $this->morphMany(Like::class, 'liked');
    }

	public function like()
	{
		$attributes = ['user_id' => auth()->id()];
		if ( !$this->likes()->where($attributes)->exists() )
			return $this->likes()->create($attributes);
    }

	public function getLikePathAttribute()
	{
		return route('replies.like', $this->id);
    }
}
