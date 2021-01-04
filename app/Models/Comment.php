<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'movie_id', 'content'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
