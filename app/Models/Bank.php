<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rekening', 'bank', 'admin_id']; // Sesuaikan dengan kolom yang ada di tabel 'banks'

    // Relasi dengan tabel 'admins'
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
