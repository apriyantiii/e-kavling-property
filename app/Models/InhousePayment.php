<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InhousePayment extends Model
{
    protected $fillable = [
        'purchase_validation_id','product_id','user_id','name','tenor','payment_type','payment_date','home_bank','destination_bank','rekening_name','nominal','remaining_amount','transfer','payment_description','status',
    ];

    protected $dates = [
        'payment_date','created_at','updated_at',
    ];

    // one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function purchaseValidation()
    {
        return $this->belongsTo(PurchaseValidation::class);
    }
}
