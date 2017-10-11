<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->thread = create('App\Thread');
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_user_can_browse_threads()
    {
        $this->get('/threads')
             ->assertSee($this->thread->title);
    }

    public function test_a_user_can_read_single_thread()
    {
        $this->get($this->thread->path)
             ->assertSee($this->thread->title);
    }   

    public function test_a_user_can_read_replies_that_are_associated_with_a_thread()
    {
         $reply = create('App\Reply', ['thread_id' => $this->thread->id]);
         //$reply = $thread->replies->first()->body;
         $this->get($this->thread->path)
              ->assertSee($reply->body);
    } 

    public function test_a_user_can_read_owner_thread()
    {
        $this->get($this->thread->path)
             ->assertSee($this->thread->owner->name);
    }
}
