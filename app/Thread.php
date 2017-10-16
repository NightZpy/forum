<?php

namespace App;

use App\Filters\ThreadFilters;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	protected $guarded = [];

	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

	public function channel()
	{
		return $this->belongsTo(Channel::class);
	}

	public function addReply($reply)
	{
		$this->replies()->create($reply);
	}

    public function getPathAttribute() {
    	return str_replace('?', '/', route('threads.show', [$this->channel->slug, $this->id], false));
    }

	public function getRepliesQuantityAttribute()
	{
		return $this->replies()->count();
    }

    public function scopeFilter($query, ThreadFilters $filters)
    {
        return $filters->apply($query);
    }
}
