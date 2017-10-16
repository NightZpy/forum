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
		$this->likes()->create(['user_id' => auth()->id()]);
    }

	public function getLikePathAttribute()
	{
		return route('replies.like', $this->id);
    }
}
