<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_validation_id', 'user_id', 'product_id', 'name', 'payment_date', 'type', 'home_bank', 'destination_bank', 'rekening_name', 'nominal', 'transfer', 'payment_description', 'status',
    ];

    public function purchaseValidation()
    {
        return $this->belongsTo(PurchaseValidation::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
