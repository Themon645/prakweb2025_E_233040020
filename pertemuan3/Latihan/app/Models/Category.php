<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // kolom yang melindungi dari mass assignment (hanya 'id' yang tidak boleh diisi manual)
    protected $guarded = ['id'];

    // relasi: satu category memiliki banyak post (One To Many)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
}
        // 'category_id' adalah foreign key di tabel posts yang merujuk ke tabel categories_id
        // artinya : satu kategori bisa memiliki banyak postingan
    }