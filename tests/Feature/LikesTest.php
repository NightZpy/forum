<?php

namespace Tests\Feature;

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LikesTest extends TestCase {
	use DatabaseMigrations;

	public function a_guests_cannot_like()
	{
		$this->get(route('replies.like', 1));
	}
	
	public function test_an_aunthenticated_user_like_a_reply()
	{
		$this->signIn();
		$reply = create('App\Reply');
		$this->get($reply->likePath);
		$this->assertCount(1, $reply->likes);
    }
}