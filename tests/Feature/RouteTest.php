<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class RouteTest extends TestCase
{
    public function testHome()
    {
        $this->get('/')
            ->assertSee('Register');
    }
public function testLogin()
    {
        $this->get('/login')
            ->assertSee('Password');
    }
}