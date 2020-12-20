<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['cenima_id','name','img_url','release_date'];

    public function cinema()
    {
        return $this->beLongsTo(Cinema::class);
    }

    public function movieStickets()
    {
        return $this->hasMany(MovieSticket::class);
    }
}
