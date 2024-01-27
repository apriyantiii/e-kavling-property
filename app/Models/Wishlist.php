<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id'];

    // Relasi dengan user dan product
    // Relasi many-to-many dengan products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi many-to-one dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}