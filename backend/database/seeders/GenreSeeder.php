<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['name' => 'Ficção', 'category' => 'Ficção Literária'],
            ['name' => 'Romance', 'category' => 'Ficção Literária'],
            ['name' => 'Aventura', 'category' => 'Ficção Literária'],
            ['name' => 'Drama', 'category' => 'Ficção Literária'],
            ['name' => 'Ficção Científica', 'category' => 'Ficção Literária'],
            ['name' => 'Fantasia', 'category' => 'Ficção Literária'],
            ['name' => 'Clássicos', 'category' => 'Ficção Literária'],
            ['name' => 'Conto', 'category' => 'Ficção Literária'],

            ['name' => 'Terror', 'category' => 'Suspense e Mistério'],
            ['name' => 'Mistério', 'category' => 'Suspense e Mistério'],
            ['name' => 'Suspense', 'category' => 'Suspense e Mistério'],
            ['name' => 'Thriller', 'category' => 'Suspense e Mistério'],

            ['name' => 'Biografia', 'category' => 'Biografias e História'],
            ['name' => 'História', 'category' => 'Biografias e História'],

            ['name' => 'Filosofia', 'category' => 'Filosofia e Psicologia'],
            ['name' => 'Psicologia', 'category' => 'Filosofia e Psicologia'],

            ['name' => 'Religião', 'category' => 'Religião e Autoajuda'],
            ['name' => 'Autoajuda', 'category' => 'Religião e Autoajuda'],

            ['name' => 'Poesia', 'category' => 'Artes e Humanidades'],
            ['name' => 'Artes', 'category' => 'Artes e Humanidades'],
            ['name' => 'Música', 'category' => 'Artes e Humanidades'],
            ['name' => 'Fotografia', 'category' => 'Artes e Humanidades'],

            ['name' => 'Política', 'category' => 'Cultura e Sociedade'],
            ['name' => 'Economia', 'category' => 'Cultura e Sociedade'],
            ['name' => 'Culinária', 'category' => 'Cultura e Sociedade'],
            ['name' => 'Esportes', 'category' => 'Cultura e Sociedade'],
            ['name' => 'Viagem', 'category' => 'Cultura e Sociedade'],

            ['name' => 'Ciência', 'category' => 'Ciência e Tecnologia'],
            ['name' => 'Tecnologia', 'category' => 'Ciência e Tecnologia'],

            ['name' => 'Literatura Infantil', 'category' => 'Literatura Infantojuvenil'],
        ];

        foreach ($genres as $genre) {
            Genre::create([
                'name' => $genre['name'],
                'category' => $genre['category']
            ]);
        }
    }
}
