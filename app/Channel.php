<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function threads()
	{
		return $this->hasMany(Thread::class);
	}

	public function getPathAttribute()
	{
		return str_replace('?', '/', route('threads.index', $this->slug, false));		
	}
}
