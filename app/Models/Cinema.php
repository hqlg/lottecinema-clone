<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'area_id', 'name', 'slug'];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
