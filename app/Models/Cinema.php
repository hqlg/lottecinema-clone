<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $fillable = ['area_id','name'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
