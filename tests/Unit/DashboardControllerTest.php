<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Session;

class DashboardControllerTest extends TestCase
{
    // testing index method which shows the dashboard view file
    // also if /dashboard route is OK
    public function testIndex()
    {
        // guest user cannot see dashboard and redirected to login page
        $response = $this->get('/dashboard');
        $response->assertStatus(302);

        // only logged in user can see dashboard
        Session::start();
        $this->call('POST', '/login', [
        'email' => 'keramot@gmail.com',
        'password' => 'keramot1234',
        '_token' => csrf_token()
        ]);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $response = $this->get('/dashboard');
        $response->assertViewHas(['posts' => $user->posts]);
        $response->assertStatus(200);
    }
}
