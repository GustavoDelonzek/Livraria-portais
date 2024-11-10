<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();
        $genres = Genre::all();

        // Associa aleatoriamente gêneros a cada livro
        foreach ($books as $book) {
            $randomGenres = $genres->random(rand(1, 3))->pluck('id');
            $book->genres()->attach($randomGenres);
        }
    }
}
