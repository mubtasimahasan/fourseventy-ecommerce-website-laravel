<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    // checking if the database contains all the columns 
    public function testUsersDatabaseColumns()
    {
        $this->assertTrue( 
          Schema::hasColumns('users', [
            'id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at'
        ]), 1);
    }

    // testing the "User has many Post" relation 
    public function testPosts()
    {
        $user    = factory(User::class)->create(); 
        $post    = factory(Post::class)->create(['user_id' => $user->id]);
        $comment = factory(Comment::class)->create(['post_id' => $post->id]);

        // posts are related to user and and is a collection instance
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->posts);
    }

}