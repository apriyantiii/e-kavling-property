<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'product_category_id', 'name', 'code', 'description', 'feature', 'status', 'location', 'size', 'price', 'photo',
    ];

    protected $casts = [
        'price' => 'integer',
    ];


    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
