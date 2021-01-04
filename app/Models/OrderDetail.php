<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id', 'gift_id', 'order_id', 'quantity'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
