<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
	use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->thread = create('App\Thread');
    }
	
    function test_a_thread_has_replies()
    {
    	$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    function test_a_thread_has_a_creator()
    {
    	$this->assertInstanceOf('App\User', $this->thread->owner);
    }

    public function test_a_can_add_a_reply ()
    {
    	$this->thread->addReply ([
    		'body'    => 'TTTTTTTTTTTTTTT',
    		'user_id' => 1
		]);

		$this->assertCount(1, $this->thread->replies);	
    }
}
