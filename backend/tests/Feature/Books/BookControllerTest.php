<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Genre;
use Database\Factories\BookFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_return_all_books()
    {
        $author = Author::factory()->create();
        $publisher = Publisher::factory()->create();

        $book = Book::factory()->create([
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
        ]);

        // Act: Fazer requisição para a rota index
        $response = $this->getJson('/api/books');

        // Assert: Validar retorno
        $response->assertStatus(200);
        $response->assertJsonStructure(['books']);
    }

    /** @test */
    public function it_should_create_a_new_book()
    {
        $author = Author::factory()->create();
        $publisher = Publisher::factory()->create();
        $genres = Genre::factory()->count(2)->create();

        $bookData = [
            'title' => 'Test Book',
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
            'published_year' => 2024,
            'genres' => $genres->pluck('id')->toArray(),
            'price' => 29.99,
            'stock' => 10,
            'description' => 'A great book!',
            'image' => UploadedFile::fake()->image('book.jpg'),
        ];

        $response = $this->postJson('/api/save_book', $bookData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('books', ['title' => 'Test Book']);
    }

    /** @test */
    public function it_should_delete_a_book()
    {
        $author = Author::factory()->create();
        $publisher = Publisher::factory()->create();
        $genres = Genre::factory()->count(2)->create();

        $bookData = [
            'title' => 'Test Book',
            'author_id' => $author->id,
            'publisher_id' => $publisher->id,
            'published_year' => '2024',
            'genres' => $genres->pluck('id')->toArray(),
            'price' => 29.99,
            'stock' => 10,
            'description' => 'A great book!',
            'image' => UploadedFile::fake()->image('book.jpg'),
        ];

        $response = $this->postJson('/api/save_book', $bookData);

        // Act: Deletar o livro
        $response = $this->deleteJson("/api/delete_book/{$bookData['title']}");
        // Assert: Validar exclusão
        $response->assertStatus(200);
    }
}
