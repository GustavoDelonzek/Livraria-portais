<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    
    protected $fillable = ['name']; 
    
    
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genre');
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'user_genre_preferences');
}


    use HasFactory;
}
