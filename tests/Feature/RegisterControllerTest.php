<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostRegister()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/register', [
            'email' => 'taro@taro.com',
            'password' => 'taro'
        ]);

        $response->assertStatus(200);
    }
}
