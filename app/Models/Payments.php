<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_validation_id',
        'name',
        'payment_date',
        'type',
        'tenor',
        'home_bank',
        'destination_bank',
        'rekening_name',
        'nominal',
        'transfer',
        'payment_description',
        'status',
    ];

    public function purchaseValidation()
    {
        return $this->belongsTo(PurchaseValidation::class);
    }
}
