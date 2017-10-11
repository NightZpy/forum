<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadTest extends TestCase
{
	use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();        
    }  
    
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
}
