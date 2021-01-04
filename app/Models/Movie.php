<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'img_url', 'release_date', 'cinema_id', 'price', 'duration', 'movie_url', 'slug', 'comment_id', 'room_id'];

    public function cinema()
    {
        return $this->beLongsTo(Cinema::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'movie_time', 'time_id', 'movie_id');
    }
}
