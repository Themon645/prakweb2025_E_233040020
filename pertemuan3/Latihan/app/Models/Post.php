<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // tentukan nama tabel secara eksplisit
    protected $table = 'post';

    // melindungi kolo, 'id' dari mass assignment, kolom lain boleh diisi massal
    protected $guarded = ['id'];

    // eager loading: otomatis load relasi author dan category saat query post
    protected $with = ['author', 'category'];

    // relasi many-to-one: banyak post dimiliki satu category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'user_id');
        // 'user_id' adalah foreign key di tabel posts
        // alias 'author' agar lebih mudah dipaca: $post->author
    }

    // relasi many-to-one: post masuk dalam satu category
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'category_id');
        // 'category_id' adalah foreign key di tabel posts
        // contoh $post->category->name untuk mendapatkan nama kategori
    }

    // query scope: filter pencarian berdasarkan search, category, dan author
    public function scopeFilter(Builder $query, array $filters): void
    {
        // filter berdasarkan judul (search)
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
            );
            
        // filter berdasarkan slug category
        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );
        
        // filter berdasarkan username author
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }
}