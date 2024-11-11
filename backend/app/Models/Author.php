<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'date_of_birth',
        'nationality',
        'img_url'
    ];
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    use HasFactory;
}
