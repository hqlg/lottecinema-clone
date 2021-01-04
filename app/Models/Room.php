<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['cinema_id', 'name', 'slug'];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }

    public function seat()
    {
        return $this->hasMany(Seat::class);
    }
}
