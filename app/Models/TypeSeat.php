<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSeat extends Model
{
    use HasFactory;
    protected $fillable = ['price','name'];

    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
