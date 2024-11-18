<?php

namespace Tests\Feature;

use App\Models\Publisher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublisherControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_all_publishers()
    {
        Publisher::factory(5)->create();

        $response = $this->getJson('/api/publishers');

        $response->assertStatus(200)
                 ->assertJsonCount(5, 'publishers');
    }

    /** @test */
    public function it_creates_a_publisher()
    {
        $data = [
            'name' => 'Tech Books Publishing',
            'address' => '123 Tech Street',
            'website' => 'https://techbooks.com',
            'contact' => '123-456-7890',
        ];

        $response = $this->postJson('/api/save_publisher', $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Tech Books Publishing']);

        $this->assertDatabaseHas('publishers', ['name' => 'Tech Books Publishing']);
    }

    /** @test */
    public function it_validates_publisher_creation()
    {
        $response = $this->postJson('/api/save_publisher', []);

        $response->assertStatus(422) // Unprocessable Entity
                 ->assertJsonValidationErrors(['name', 'address', 'contact']);
    }

    /** @test */
    public function it_updates_a_publisher()
    {
        $publisher = Publisher::factory()->create();

        $data = [
            'name' => 'Updated Publisher Name',
            'address' => 'Updated Address',
            'website' => 'https://updatedwebsite.com',
            'contact' => '987-654-3210',
        ];

        $response = $this->postJson("/api/update_publisher/{$publisher->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Updated Publisher Name']);

        $this->assertDatabaseHas('publishers', ['name' => 'Updated Publisher Name']);
    }

    /** @test */
    public function it_deletes_a_publisher()
    {
        $publisher = Publisher::factory()->create();

        $response = $this->deleteJson("/api/delete_publisher/{$publisher->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Publisher deleted successfully']);

        $this->assertDatabaseMissing('publishers', ['id' => $publisher->id]);
    }

    /** @test */
    public function it_searches_for_publishers()
    {
        Publisher::factory()->create(['name' => 'Alpha Publishing']);
        Publisher::factory()->create(['name' => 'Beta Publishing']);

        $response = $this->getJson('/api/search/publishers?query=Beta');

        $response->assertStatus(200)
                 ->assertJsonCount(1, 'publishers')
                 ->assertJsonFragment(['name' => 'Beta Publishing']);
    }

    /** @test */
    public function it_fetches_a_single_publisher()
    {
        $publisher = Publisher::factory()->create();

        $response = $this->getJson("/api/get_publisher/{$publisher->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $publisher->name]);
    }

    /** @test */
    public function it_returns_404_when_fetching_nonexistent_publisher()
    {
        $response = $this->getJson('/api/get_publisher/999');

        $response->assertStatus(404)
                 ->assertJsonFragment(['message' => 'Publisher not found']);
    }
}
