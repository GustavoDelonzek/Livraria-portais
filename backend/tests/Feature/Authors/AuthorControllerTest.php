<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_all_authors()
    {
        Author::factory(5)->create();

        $response = $this->getJson('/api/authors');

        $response->assertStatus(200)
                 ->assertJsonCount(5, 'authors');
    }

    /** @test */
    public function it_creates_an_author()
    {
        Http::fake([
            'https://api.imgbb.com/1/upload' => Http::response(['data' => ['display_url' => 'http://example.com/image.jpg']], 200),
        ]);

        $data = [
            'name' => 'John Doe',
            'bio' => 'A famous author.',
            'date_of_birth' => '1980-01-01',
            'nationality' => 'American',
            'image' => UploadedFile::fake()->image('author.jpg'),
        ];

        $response = $this->postJson('/api/save_author', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'John Doe']);

        $this->assertDatabaseHas('authors', ['name' => 'John Doe']);
    }

    /** @test */
    public function it_validates_author_creation()
    {
        $response = $this->postJson('/api/save_author', []);

        $response->assertStatus(422) // Unprocessable Entity
                 ->assertJsonValidationErrors(['name', 'date_of_birth', 'nationality', 'image']);
    }

    /** @test */
    public function it_updates_an_author()
    {
        Http::fake([
            'https://api.imgbb.com/1/upload' => Http::response(['data' => ['display_url' => 'http://example.com/image.jpg']], 200),
        ]);

        $author = Author::factory()->create();

        $data = [
            'name' => 'Updated Name',
            'bio' => 'Updated Bio',
            'date_of_birth' => '1990-01-01',
            'nationality' => 'Updated Nationality',
        ];

        $response = $this->postJson("/api/update_author/{$author->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Name']);

        $this->assertDatabaseHas('authors', ['name' => 'Updated Name']);
    }

    /** @test */
    public function it_deletes_an_author()
    {
        $author = Author::factory()->create();

        $response = $this->deleteJson("/api/delete_author/{$author->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Author deleted successfully']);

        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    /** @test */
    public function it_searches_for_authors()
    {
        Author::factory()->create(['name' => 'John Doe']);
        Author::factory()->create(['name' => 'Jane Doe']);

        $response = $this->getJson('/api/search/authors?query=Jane');

        $response->assertStatus(200)
                 ->assertJsonCount(1, 'authors')
                 ->assertJsonFragment(['name' => 'Jane Doe']);
    }

    /** @test */
    public function it_fetches_a_single_author()
    {
        $author = Author::factory()->create();

        $response = $this->getJson("/api/get_author/{$author->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $author->name]);
    }
}
