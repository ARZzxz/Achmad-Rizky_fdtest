<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase; // Agar database di-refresh setiap test

    /** @test */
    public function it_returns_books_on_landing_page()
    {
        // Create a dummy user
        $user = User::factory()->create();

        // Create dummy books
        Book::factory()->create([
            'title' => 'Test Book 1',
            'author' => 'Author 1',
            'rating' => 4,
        ]);
        Book::factory()->create([
            'title' => 'Test Book 2',
            'author' => 'Author 2',
            'rating' => 5,
        ]);

        // Simulate logging in as the user
        $this->actingAs($user);

        // Send a GET request to the landing page
        $response = $this->get('/');

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the books are shown in the response
        $response->assertSee('Test Book 1');
        $response->assertSee('Test Book 2');
    }

    /** @test */
    public function it_filters_books_by_author()
    {
        // Create a dummy user
        $user = User::factory()->create();

        // Create dummy books
        Book::factory()->create([
            'title' => 'Test Book 1',
            'author' => 'Author 1',
            'rating' => 4,
        ]);
        Book::factory()->create([
            'title' => 'Test Book 2',
            'author' => 'Author 2',
            'rating' => 5,
        ]);

        // Simulate logging in as the user
        $this->actingAs($user);

        // Send a GET request with the filter for author 'Author 1'
        $response = $this->get('/?author=Author+1');

        // Assert that only 'Test Book 1' is displayed
        $response->assertSee('Test Book 1');
        $response->assertDontSee('Test Book 2');
    }

    /** @test */
    public function it_filters_books_by_rating()
    {
        // Create a dummy user
        $user = User::factory()->create();

        // Create dummy books
        Book::factory()->create([
            'title' => 'Test Book 1',
            'author' => 'Author 1',
            'rating' => 4,
        ]);
        Book::factory()->create([
            'title' => 'Test Book 2',
            'author' => 'Author 2',
            'rating' => 5,
        ]);

        // Simulate logging in as the user
        $this->actingAs($user);

        // Send a GET request with the filter for rating 5
        $response = $this->get('/?rating=5');

        // Assert that only 'Test Book 2' is displayed
        $response->assertSee('Test Book 2');
        $response->assertDontSee('Test Book 1');
    }
}
