<?php

namespace Tests\Feature;

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LikesTest extends TestCase {
	use DatabaseMigrations;

	public function test_a_guests_cannot_like()
	{
		$this->withExceptionHandling()
			 ->get(route('replies.like', 1))
			 ->assertRedirect('/login');
	}
	
	public function test_an_aunthenticated_user_like_a_reply()
	{
		$this->signIn();
		$reply = create('App\Reply');
		$this->get($reply->likePath);
		$this->assertCount(1, $reply->likes);
    }

	public function test_an_authenticated_user_only_like_once()
	{
		$this->signIn();
		$reply = create('App\Reply');

		try {
			$this->get($reply->likePath);
			$this->get($reply->likePath);
		} catch (Illuminate\Database\QueryException $e) {
			$this->fail('Only one like by user on reply is accepted!');
		}
		$this->assertCount(1, $reply->likes);
    }
}