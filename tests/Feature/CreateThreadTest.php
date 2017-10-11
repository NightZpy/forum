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
        $this->thread = make('App\Thread');
    }  
    
    public function test_a_authenticated_user_may_create_a_thread()
	{
    	$this->signIn ();

    	$this->post('/threads', $this->thread->toArray());

    	$this->get($this->thread->path)
    		 ->assertSee($this->thread->title)
    		 ->assertSee($this->thread->body);
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
