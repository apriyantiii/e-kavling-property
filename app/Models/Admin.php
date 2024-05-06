<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'admins';
    protected $fillable = [
        'name', 'email', 'password', 'level', 'gender', 'contact', 'address'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'admin_id');
    }

    // Relasi dengan tabel 'banks'
    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

    // Relasi One-to-Many
    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }

    // Relasi one-to-many
    public function payments()
    {
        return $this->hasMany(Payments::class);
    }

    public function inhousePayments()
    {
        return $this->hasMany(InhousePayment::class);
    }

    // Definisi relasi one-to-many dengan model PurchaseValidation
    public function purchaseValidations()
    {
        return $this->hasMany(PurchaseValidation::class);
    }
}
