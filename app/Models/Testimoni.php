<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'admin_id', 'profesi', 'message', 'photo'];

    // relasi many to one
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
