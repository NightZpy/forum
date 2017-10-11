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
        $this->thread = factory('App\Thread')->make();
    }  
    
    public function test_a_authenticated_user_may_create_a_thread()
	{
    	$user = factory('App\User')->create();
    	$this->actingAs ($user);	

    	$this->post('/threads', $this->thread->toArray());

    	$this->get($this->thread->path)
    		 ->assertSee($this->thread->title)
    		 ->assertSee($this->thread->body);
	}  

	public function test_a_guests_may_create_a_thread()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/threads', []);

	}
}
