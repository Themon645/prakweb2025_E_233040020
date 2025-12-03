<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // kolom yang boleh diisi secara massal assignment
    protected $fillable = [
        'name', // nama lengkap pengguna
        'username', // nama pengguna unik untuk login
        'email', // alamat email pengguna untuk login        
        'password', // password yang akan di hash otomatis
    ];

    // kolom yang disembunyikan saat realisasi (respone JSON/array)
    protected $hidden = [
        'password', // jangan tampilkan password di response
        'remember_token', // jangan tampilkan token di response
    ];

    // tipe data casting untuk kolom tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // cast ke object datetime
            'password' => 'hashed', // otomatis hash password saat insert/update
        ];
    }

    // relasi: satu user memiliki banyak post (One To Many)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
        // 'user-Id' adalah foreign key di tabel posts yang merujuk ke tabel users_id
    }
    
}
