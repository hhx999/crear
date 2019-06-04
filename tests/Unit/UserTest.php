<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHelloWorld()
    {
        $this->assertTrue(true);
    }
    public function testBasicHttp()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testLogin()
    {
        $this->get('/')->assertSee('INGRESO');
        $datos = [
            "dni" => "777",
            "password" => "1234"
        ];

        $response = $this->post('/', $datos);
        $response->assertRedirect('/admin');
    }
}
