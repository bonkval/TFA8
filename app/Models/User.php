<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const UPDATED_AT = null;

    protected $fillable = ['username', 'full_name', 'avatar', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['email_verified_at' => 'datetime', 'password' => 'hashed'];
    }

    // Breeze uses name for display; keep the POS full_name column.
    public function getNameAttribute(): string
    {
        return $this->full_name;
    }
}
