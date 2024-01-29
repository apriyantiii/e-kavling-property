<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseValidation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'nik',
        'job',
        'age',
        'telpon',
        'address',
        'status',
    ];

    // Definisi relasi many-to-one dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
