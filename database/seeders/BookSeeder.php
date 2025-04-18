<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'rating' => 4,
            'thumbnail' => 'https://via.placeholder.com/150',
            'user_id' => 1, 
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'rating' => 5,
            'thumbnail' => 'https://via.placeholder.com/150',
            'user_id' => 1,
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'rating' => 3,
            'thumbnail' => 'https://via.placeholder.com/150',
            'user_id' => 1,
        ]);
    }
}