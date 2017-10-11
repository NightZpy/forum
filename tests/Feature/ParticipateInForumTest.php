<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
	use DatabaseMigrations;

    public function test_a_unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('threads/1/replies', []);
    }

    public function test_an_authenticated_user_may_participate_in_forum_threads()
    {
    	$user = factory('App\User')->create();
    	$this->actingAs ($user);
    	$thread = factory('App\Thread')->create();
    	$reply = factory('App\Reply')->make(); //This make the reply only in memory, don't persistent
    	$this->post($thread->path . '/replies', $reply->toArray());
    	$this->get($thread->path)
    		 ->assertSee ($reply->body);
    }
}