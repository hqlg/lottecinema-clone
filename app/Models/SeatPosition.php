<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatPosition extends Model
{
    use HasFactory;
    protected $fillable = ['row','column'];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
