<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title',
        'author_id',
        'publisher_id',
        'published_year',
        'genre',
        'price',
        'stock',
        'description'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);


    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function updateStock(int $quantity, string $operation)
    {
        if ($operation === 'saida') {
            if ($this->stock < $quantity) {
                return "Estoque insuficiente para a quantidade solicitada!";
            }
            $this->stock -= $quantity;

        } elseif ($operation === 'entrada') {
            $this->stock += $quantity;
        } else {
            return "Operação inválida!";
        }

        $this->save();
        return true;
    }


    use HasFactory;
}
