<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','gift_category_id'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function giftCategory()
    {
        return $this->belongsTo(GiftCategory::class);
    }
}
