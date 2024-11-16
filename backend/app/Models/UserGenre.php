<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGenre extends Model
{
    use HasFactory;
    protected $table = 'user_genre_preferences'; 

    protected $fillable = [
        'user_id',
        'genre_id',
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com o modelo Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
