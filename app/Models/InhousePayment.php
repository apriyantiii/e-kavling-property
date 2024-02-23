<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InhousePayment extends Model
{
    protected $fillable = [
        'purchase_validation_id',
        'product_id',
        'user_id',
        'name',
        'tenor',
        'type',
        'payment_date',
        'home_bank',
        'destination_bank',
        'rekening_name',
        'nominal',
        'transfer',
        'payment_description',
        'status',
    ];

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchaseValidation()
    {
        return $this->belongsTo(PurchaseValidation::class);
    }
}
