<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_register()
    {
        // Data untuk pendaftaran user
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ];

        // Melakukan request untuk registrasi
        $response = $this->post('/register', $data);

        // Assert bahwa user berhasil dibuat
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com'
        ]);

        // Assert bahwa response statusnya 201 (created)
        $response->assertStatus(201);
    }

    /** @test */
    public function user_can_login()
    {
        // Membuat user
        $user = User::factory()->create([
            'password' => bcrypt($password = 'password123')
        ]);

        // Melakukan login dengan kredensial yang benar
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password
        ]);

        // Assert bahwa response statusnya 200 (OK)
        $response->assertStatus(200);

        // Assert bahwa user berhasil login dan ada token atau data lainnya
        $response->assertJsonStructure(['token']);
    }

    /** @test */
    public function login_fails_with_incorrect_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password123')
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrongpassword'
        ]);

        $response->assertStatus(401); // Unauthorized
    }
}
