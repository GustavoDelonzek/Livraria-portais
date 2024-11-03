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
    public function it_can_login_with_valid_credentials()
    {
        // Crie um usuário para o teste
        $user = User::create([
            'name' => 'um usuario ae',
            'email' => 'teste@exemplo.com',
            'password' => Hash::make('senha123'), // Certifique-se de hash a senha
        ]);

        // Faça uma requisição POST para a rota de login
        $response = $this->post('/login', [
            'email' => 'teste@exemplo.com',
            'password' => 'senha123',
        ]);

        // Verifique se a resposta é 200 e se a mensagem está correta
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Login bem-sucedido!']);
    }

    /** @test */
    public function it_cannot_login_with_invalid_credentials()
    {
        // Faça uma requisição POST para a rota de login com credenciais inválidas
        $response = $this->post('/login', [
            'email' => 'errado@exemplo.com',
            'password' => 'senhaerrada',
        ]);

        // Verifique se a resposta é 401 e se a mensagem está correta
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Credenciais inválidas.']);
    }
}