<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseValidation extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id', 'product_id', 'admin_id', 'name', 'nik', 'job', 'age', 'telpon', 'address', 'status', 'kk_file', 'ktp_file',
    ];
    // Definisi relasi many-to-one dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Definisi relasi many-to-one dengan model ProductPro
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // one to many
    public function payment()
    {
        return $this->hasMany(Payments::class, 'purchase_validation_id');
    }
    // one to many
    public function inhousePayments()
    {
        return $this->hasMany(InhousePayment::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
