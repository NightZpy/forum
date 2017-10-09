<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

    public function getPathAttribute() {
    	return route('threads.show', $this->id);
    }
}
