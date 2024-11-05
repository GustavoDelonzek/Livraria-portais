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
            'is_admin' => false, // Usuário comum
        ]);

        // Faça uma requisição POST para a rota de login
        $response = $this->post('/login', [
            'email' => 'teste@exemplo.com',
            'password' => 'senha123',
        ]);

        // Verifique se a resposta é 200 e se a mensagem está correta
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Login bem-sucedido! Você é um usuário comum.']);
    }

    /** @test */
    public function it_can_login_as_admin_with_valid_credentials()
    {
        // Crie um usuário admin para o teste
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@exemplo.com',
            'password' => Hash::make('senha123'), // Certifique-se de hash a senha
            'is_admin' => true, // Usuário admin
        ]);

        // Faça uma requisição POST para a rota de login
        $response = $this->post('/login', [
            'email' => 'admin@exemplo.com',
            'password' => 'senha123',
        ]);

        // Verifique se a resposta é 200 e se a mensagem está correta
        $response->assertStatus(200);
        $response->assertJson(['message' => 'Login bem-sucedido! Você é um administrador.']);
        $response->assertJson(['redirect' => '/admin/dashboard']); // Verifica a URL de redirecionamento
    }

    /** @test */
    public function it_cannot_login_as_user_with_valid_credentials_on_admin_dashboard(){
        // crue um usuario normal para o teste
        $user = User::create([
            'name' => 'User User',
            'email' => 'user@exemplo.com',
            'password' => Hash::make('senha123'), // Certifique-se de hash a senha
            'is_admin' => false, // Usuário comum
        ]);
        
        // Faça uma requisição POST para a rota de login    
        $response = $this->post('/login', [
            'email' => 'user@exemplo.com',
            'password' => 'senha123',
        ]);
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(404);
        
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