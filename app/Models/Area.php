<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function cinemas()
    {
        return $this->hasMany(Cinema::class);
    }

    public static function getAllExceptById($id)
    {
        return Area::all()->where('id', '!=', $id);
    }
}
