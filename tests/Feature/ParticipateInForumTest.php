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
    	$user = create('App\User');
    	$this->actingAs ($user);
    	$thread = create('App\Thread');
    	$reply = make('App\Reply'); //This make the reply only in memory, don't persistent
    	$this->post($thread->path . '/replies', $reply->toArray());
    	$this->get($thread->path)
    		 ->assertSee ($reply->body);
    }
}