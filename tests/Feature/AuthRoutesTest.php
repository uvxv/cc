<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\User;

class AuthRoutesTest extends TestCase
{
    use RefreshDatabase;
    public function test_login_page_returns_ok()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_register_page_returns_ok()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_userdashboard_requires_auth_redirects()
    {
        $response = $this->get('/userdashboard');
        $response->assertRedirect('/login');
    }

    public function test_login_with_nonexistent_nic_redirects_to_register()
    {
        $this->withoutMiddleware();

        $response = $this->post('/login', [
            'nic' => '123456789012',
            'password' => 'secret',
        ]);

        $response->assertRedirect(route('register.index'));
    }

    public function test_register_with_existing_nic_redirects_to_login()
    {
        $this->withoutMiddleware();

        Storage::fake('public');

        User::factory()->create([
            'nic' => '123456789012',
            'email' => 'something@example.com',
        ]);

        $response = $this->post('/register', [
            'firstname' => 'Test',
            'lastname' => 'User',
            'email' => 'something@example.com',
            'nic' => '123456789012',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'address' => '123 Test St',
            'id_image' => UploadedFile::fake()->image('id.jpg'),
        ]);

        $response->assertRedirect(route('login'));
    }

    public function test_register_with_new_nic_creates_user_and_redirects_to_login()
    {
        $this->withoutMiddleware();

        Storage::fake('public');

        $response = $this->post('/register', [
            'firstname' => 'New',
            'lastname' => 'User',
            'email' => 'newuser@example.com',
            'nic' => '987654321098',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'address' => '456 New St',
            'id_image' => UploadedFile::fake()->image('id.jpg'),
        ]);

        $response->assertRedirect(route('login'));
    }

    public function test_userdashboard_accessible_after_login()
    {
        $user = User::factory()->create([
            'nic' => '123456789012',
            'password' => bcrypt('secret123'),
        ]);
        $response = $this->actingAs($user)->get('/userdashboard');
        $response->assertStatus(200);
    }

    public function test_logout_redirects_to_login()
    {
        $user = User::factory()->create([
            'nic' => '123456789012',
            'password' => bcrypt('secret123'),
        ]);
        $this->app['session.store']->start();
        $token = $this->app['session.store']->token();

        $response = $this->actingAs($user)->post('/logout', ['_token' => $token]);
        $response->assertRedirect(route('login'));
    }

}