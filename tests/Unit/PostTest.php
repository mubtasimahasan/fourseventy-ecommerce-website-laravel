<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class PostTest extends TestCase
{
    use DatabaseTransactions;

    // checking if the database contains all the columns 
    public function testPostsDatabaseColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('posts', [
            'id', 'title', 'body', 'created_at', 'updated_at', 'user_id', 'cover_image'
        ]), 1);
    }

    // testing the "Post belongs to User" relation 
    public function testUser()
    {
        $user = factory(User::class)->create(); 
        $post = factory(Post::class)->create(['user_id' => $user->id]);
        $comment = factory(Comment::class)->make(['post_id' => $post->id]);
        
         $this->assertInstanceOf(User::class, $post->user);
    }

    // testing the "Post has many Comment" relation 
    public function testComment()
    {
        $user    = factory(User::class)->create(); 
        $post    = factory(Post::class)->create(['user_id' => $user->id]);
        $comment = factory(Comment::class)->create(['post_id' => $post->id]);
   
        // Comments are related to posts and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $post->comments);
    }
}
