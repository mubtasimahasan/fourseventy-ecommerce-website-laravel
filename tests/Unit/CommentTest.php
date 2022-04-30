<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class CommentTest extends TestCase
{
    use DatabaseTransactions;

    // checking if the database contains all the columns 
    public function testCommentsDatabaseColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('comments', [
            'id', 'user_id','post_id','parent_id','body'
        ]), 1);
    }

    // testing the "Comment belongs to User" relation 
    public function testUser()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create(['user_id' => $user->id]); 

        $this->assertInstanceOf(User::class, $comment->user);
    }

    // testing the "Comment has many Comment" relation 
    // multiple comments have the same parent_id because of this relation
    public function testReplies()
    {
        $comment = factory(Comment::class)->create(['parent_id' => 99]);
        $comment = factory(Comment::class)->create(['parent_id' => 99]);
   
        $this->assertEquals(99, $comment->parent_id);   
    }
}
