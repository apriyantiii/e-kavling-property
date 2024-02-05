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
        'name', 'email', 'password', 'level'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'admin_id');
    }
}
