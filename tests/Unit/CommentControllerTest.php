<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Comment;
use Session;


class CommmentControllerTest extends TestCase
{
    // testing the store method which stores a newly created comment in storage
    public function testStore()
    {
        $comment = new Comment;
        $comment->id = 999;
        $comment->user_id = 2;
        $comment->post_id = 1;
        $comment->body = 'test comment';
        $comment->save();

        $this->assertDatabaseHas('comments', [
            'body'=>'test comment'
        ]);
    }

    // testing the destroy method which removes the specified comment from storage.
    public function testDestroy(){
        $comment = Comment::find(999);
        $comment->delete();
        
        $this->assertDatabaseMissing('comments', [
            'body'=>'test comment'
        ]);
    }
}