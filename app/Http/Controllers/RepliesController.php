<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use App\Thread;

class RepliesController extends Controller
{
	public function __construct()
	{
		$this->middleware ('auth')
			 ->only('store', 'like');
	}

    public function store(Request $request, $channelId, Thread $thread)
    {
    	$this->validate($request, [
            'body' => 'required'
        ]);
    	$thread->addReply ( [
    		'body'    => request ('body'),
    		'user_id' => auth()->id()
		]);

		return back();
    }

	public function like(Reply $reply)
	{
		$reply->like();
    }
}
