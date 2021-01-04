<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'password', 'email', 'address', 'phone', 'avatar_url'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::all());
    }
}
