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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    // kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'name', // nama lengkap user
        'username', // username unik untuk login
        'email', // email untuk untuk login
        'password', // password yang akan di-hash otomatis
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    // kolom yang disembunyikan saat serialisasi (response JSON/array)
    protected $hidden = [
        'password', // jangan tampilkan password di response
        'remember_token', // jangan tampilkan token di response
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    // tipe data casting untuk kolom tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // cast ke object datetime
            'password' => 'hashed', // otomatis hash password saat insert/update
        ];
    }

    // relasi: satu user memiliki banyak post (one-to-many)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
        // 'user_id' adalah foreign key di tabel posts yang menunjuk ke tabel users.id
    }
}
