<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicPages extends TestCase
{
    use RefreshDatabase;

   /**
     * When user isn't logged in redirects to 
     *
     * @return void
     */
    public function testHomePageRedirect()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    /**
     * When hitting login screen
     *
     * @return void
     */
    public function testLoginScreen()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * When hitting registration screen
     *
     * @return void
     */
    public function testRegistrationScreen()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
