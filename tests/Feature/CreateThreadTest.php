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
    	$this->be ($user);	

    	$this->post('/threads', $this->thread->toArray());

    	$this->get('/threads')
    		 ->assertSee($this->thread->title);
	}  

	public function test_a_unauthenticated_users_may_not_create_a_thread()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/threads', []);

	}
}
