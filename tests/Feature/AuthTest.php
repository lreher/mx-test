<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * When we create a new user redirects to login
     *
     * @return void
     */
    public function testRegistration()
    {
        $response = $this->post('register', [
            'username' => 'Test',
            'email' => 'test@hotmail.com',
            'password' => 'myPassword1',
            'password_confirmation' => 'myPassword1'
        ]);
    
        $response->assertRedirect('/login');
    }

    /**
     * When we log in redirect to home
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->post('login', [
            'login' => 'test@hotmail.com',
            'password' => 'myPassword1',
        ]);
    
        $response->assertRedirect('/');
    }
}
