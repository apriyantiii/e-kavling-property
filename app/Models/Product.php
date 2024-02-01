<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id', 'product_category_id', 'name', 'code', 'description', 'feature', 'status', 'location', 'latitude', 'longitude', 'size', 'price', 'photo', 'video_url',
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

    // Relasi many-to-many dengan wishlists
    public function wishlist()
    {
        return $this->belongsToMany(Wishlist::class);
    }

    public function purchaseValidations()
    {
        return $this->hasMany(PurchaseValidation::class);
    }

    public function payments()
    {
        return $this->hasMany(Payments::class, 'purchase_validation_id', 'id');
    }
}
