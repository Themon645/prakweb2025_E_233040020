<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    // kolom yang dilindungi dari mass assignment (hanya 'id' yang tidak boleh diisi manual)
    protected $guarded = ['id'];

    // relasi: satu kategori memiliki banyak post (one-to-many)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
        // 'category_id' adalah foreign key di tabel posts yang menunjuk ke tabel categories.id
        // artinya satu kategori bisa memiliki banyak post
    }
}
