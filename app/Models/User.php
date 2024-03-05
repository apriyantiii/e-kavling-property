<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'gender',
        'role',
        'contact',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Definisi relasi one-to-many dengan model PurchaseValidation
    public function purchaseValidations()
    {
        return $this->hasMany(PurchaseValidation::class);
    }

    public function chat()
    {
        return $this->hasMany(Chat::class);
    }

    public function payments()
    {
        return $this->hasMany(Payments::class);
    }

    public function inhousePayments()
    {
        return $this->hasMany(InhousePayment::class);
    }
}
