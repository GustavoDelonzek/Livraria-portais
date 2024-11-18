<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_register(){
        $response = $this->post('/api/register', [
            'name' => 'user',
            'email' => 'user@teste.com',
            'password' => 'senha123',
            'password_confirmation' => 'senha123',
        ]);

        $response->assertStatus(201);
    }

    /** @test */
    public function it_can_login_with_valid_credentials()
    {
        $user = User::create([
            'name' => 'user',
            'email' => 'user@teste.com',
            'password' => Hash::make('senha123'),
            'role' => "user", 
        ]);

        $response = $this->post('/api/login', [
            'email' => 'user@teste.com',
            'password' => 'senha123',
        ]);

        $response->assertStatus(200);
    }

    /** @test */
    public function it_cannot_login_with_invalid_credentials()
    {
        $response = $this->post('/api/login', [
            'email' => 'errado@exemplo.com',
            'password' => 'senhaerrada',
        ]);

        $response->assertStatus(401);
    }
}