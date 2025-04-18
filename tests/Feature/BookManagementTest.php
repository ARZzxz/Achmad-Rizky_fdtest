<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_book()
    {
        $user = User::factory()->create();

        // Simulate user login
        $this->actingAs($user);

        // Data buku
        $data = [
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'A story of the Jazz Age in America.',
            'rating' => 5,
        ];

        // Simulate request untuk menambah buku
        $response = $this->post('/books', $data);

        // Assert buku ada di database
        $this->assertDatabaseHas('books', $data);

        // Assert status sukses
        $response->assertStatus(201);
    }

    /** @test */
    public function user_can_update_a_book()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['user_id' => $user->id]);

        // Simulate user login
        $this->actingAs($user);

        // Data baru untuk update buku
        $data = [
            'title' => 'The Great Gatsby (Updated)',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'Updated description.',
            'rating' => 5,
        ];

        // Simulate request untuk update buku
        $response = $this->put("/books/{$book->id}", $data);

        // Assert buku telah di-update
        $this->assertDatabaseHas('books', $data);

        // Assert status sukses
        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_delete_a_book()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['user_id' => $user->id]);

        // Simulate user login
        $this->actingAs($user);

        // Simulate request untuk menghapus buku
        $response = $this->delete("/books/{$book->id}");

        // Assert buku telah dihapus
        $this->assertDatabaseMissing('books', ['id' => $book->id]);

        // Assert status sukses
        $response->assertStatus(200);
    }
}
