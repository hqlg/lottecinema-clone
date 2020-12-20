<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSticket extends Model
{
    use HasFactory;
    protected $fillable = ['seat_id','movie_id'];

    public function seat()
    {
        return $this->hasOne(Seat::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
