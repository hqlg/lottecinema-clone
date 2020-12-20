<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable = ['seat_position_id','type_seat_id'];

    public function movieSticket()
    {
        return $this->belongsTo(Movie::class);
    }

    public function seatPosition()
    {
        return $this->belongsTo(SeatPosition::class);
    }

    public function typeSeat()
    {
        return $this->belongsTo(TypeSeat::class);
    }
}
