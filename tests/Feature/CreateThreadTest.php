<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadTest extends TestCase
{
	use DatabaseMigrations;
    
    public function test_a_authenticated_user_may_create_a_thread()
	{
    	$this->signIn ();
        $thread = make('App\Thread');
    	$this->post('/threads', $thread->toArray());
        $thread = \App\Thread::orderBy('created_at', 'desc')->first();
        //or can get the path with the header redirected location from post call
        //$response->headers->get('Location') $response is return for post call
    	$this->get($thread->path)
    		 ->assertSee($thread->title)
    		 ->assertSee($thread->body);
	}  

	public function test_a_guests_cannot_create_a_thread()
	{        
        //$this->expectException('Illuminate\Auth\AuthenticationException');
        $this->withExceptionHandling();
             
        $this->get('/threads/create')
             ->assertRedirect('/login');

        $this->post('/threads', [])
             ->assertRedirect('/login');

    }

    public function test_a_thread_validate_create_data()
    {        
        $params = ['title' => null, 'body' => null];
        $this->publishThread($params)
             ->assertSessionHasErrors(['title', 'body']);
    }

    public function test_a_thread_have_a_valid_channel()
    {
        factory('App\Channel', 1)->create();

        $this->publishThread(['channel_id' => null])
             ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 2])
             ->assertSessionHasErrors('channel_id');
    }

    public function publishThread($params = [])
    {
        $this->withExceptionHandling()->signIn();
        $thread = make ('App\Thread', $params);
        return $this->post('/threads', $thread->toArray());
    }
}
