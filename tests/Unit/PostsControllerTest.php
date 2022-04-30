<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;
use Session;


class PostsControllerTest extends TestCase
{
    // testing the index method which returns index view file 
    // also if the /posts route is OK
    public function testIndex()
    {
        $response = $this->get('/posts');
        $response->assertStatus(200);
        $response->assertViewHas('posts');
    }

    // testing the create method which returns create view file
    // also if /posts/create route is OK
    public function testCreate()
    {
        // guest user cannot access /create route and redirected to login page
        $response = $this->get('/posts/create');
        $response->assertStatus(302);

        // only logged in user can view /create
        Session::start();
        $this->call('POST', '/login', [
        'email' => 'keramot@gmail.com',
        'password' => 'keramot1234',
        '_token' => csrf_token()
        ]);

        $response = $this->get('/posts/create');
        $response->assertStatus(200);
    }

    // testing the store method which stores a new post into database
    // also if /posts route is OK 
    public function testStore()
    {
        $post = new Post;
        $post->id = 999;
        $post->title = 'test title';
        $post->body = 'test body';
        $post->user_id = 2;
        $post->cover_image = 'noimage.jpg';
        $post->save();
        $this->assertDatabaseHas('posts', [
            'title'=>'test title'
        ]);

        $response = $this->get('/posts', ['success' =>  'Post Created']);
        $response->assertStatus(200);
       
    }

    // testing the show method which return the show view file
    // also if /posts/{$id}
    public function testShow()
    {
        $id = 2;
        $post = Post::find($id);
        $response = $this->get('/posts/2', ['post' => $post]);
        $response->assertStatus(200);
        $response->assertViewHas('post');
    }

    // testing the edit method returns the edit view file
    // also if /posts/{$id}/edit is accessible
    public function testEdit()
    {
        $post = 1;
        Session::start();
        $this->call('POST', '/login', [
        'email' => 'keramot@gmail.com',
        'password' => 'keramot1234',
        '_token' => csrf_token()
        ]);

        // only the user who created the post can edit
        $response = $this->get('/posts/1/edit', ['post' => $post]);
        $response->assertStatus(200);
        // if the post was not made by the current user it will redirect
        $response = $this->get('/posts/2/edit', ['post' => $post]);
        $response->assertStatus(302);
    }

    // testing the update method which updates a post info into database
    // also if /posts route displays message
    public function testUpdate()
    {   
        $post = Post::find(999);
        $post->title = 'test title update';
        $post->body = 'test body update';
        $post->user_id = 2;
        $post->cover_image = 'noimage.jpg';
        $post->save();
        $this->assertDatabaseHas('posts', [
            'title'=>'test title update'
        ]);

        $response = $this->get('/posts', ['success' => 'Post Updated']);
        $response->assertStatus(200);
        
    }

    // testing the destroy method which deletes a post from database
    // also if /posts route displays post deleted message
    public function testDestroy()
    {
        $post = Post::find(999);
        $post->delete();

        $response = $this->get('/posts', ['success' => 'Post Deleted']);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', [
            'title'=>'test title update'
        ]);
    }
    
}
