<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'product_id',
        'message',
    ];
    // one to many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // one to many
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    // one to many
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
