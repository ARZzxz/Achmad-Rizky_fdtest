<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data dummy buku
        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'author' => 'J.K. Rowling',
            'description' => 'A young wizard\'s journey begins at Hogwarts School of Witchcraft and Wizardry.',
            'rating' => 5,
            'thumbnail' => 'thumbnails/harry_potter.jpg',
            'user_id' => 1
        ]);

        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'A novel set in the Jazz Age, exploring themes of wealth, class, and the American Dream.',
            'rating' => 4,
            'thumbnail' => 'thumbnails/gatsby.jpeg',
            'user_id' => 1
        ]);

        Book::create([
            'title' => 'To Kill a Mockingbird',
            'author' => 'Harper Lee',
            'description' => 'A gripping tale of racial injustice in the Deep South during the 1930s.',
            'rating' => 5,
            'thumbnail' => 'thumbnails/mockingbird.jpeg',
            'user_id' => 1
        ]);

        Book::create([
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'A dystopian novel that explores the dangers of totalitarianism.',
            'rating' => 4,
            'thumbnail' => 'thumbnails/1984.jpeg',
            'user_id' => 1
        ]);
    }
}
