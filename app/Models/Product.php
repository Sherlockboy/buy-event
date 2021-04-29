<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'price',
        'image'
    ];

    public function getPriceAttribute()
    {
        return "$" . $this->attributes['price'];
    }

    public function getImageAttribute()
    {
        return "/images/products/" . $this->attributes['image'];
    }
}
