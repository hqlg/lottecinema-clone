<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

}
