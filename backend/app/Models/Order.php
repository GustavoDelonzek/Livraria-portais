<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', // Adicione esta linha
        'total',
        'status',
    ];
    public function orderItems()
    {

        return $this->hasMany(OrderItem::class);

    }
}
