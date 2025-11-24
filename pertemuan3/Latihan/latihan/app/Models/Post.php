<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // melindungi kolom 'id' dari mass assignment, kolom lain bebas 
    protected $guarded = ['id'];
    // eager loading: otomatis load relasi author dan category setiap query post
    protected $with = ['author', 'category'];

    // relasi many-to-one: post ditulis oleh User (author)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
        // 'user_id' adalah foreign key di tabel posts yang menunjuk ke tabel posts.id
        // alias 'author' agarlebih mudah dibaca: $post->author
    }

    // relasi many-to-one: post masuk dalam satu Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id');
        // 'category_id' adalah foreign key di tabel posts 
        // contoh: $post->category->name
    }

    // query scope: filter pencarian berdasarkan search, category, atau author
    public function scopeFilter(Builder $query, array $filters): void
    {
        // filter berdasarkan judul (search)
        $query->when(
            $filters['search'] ?? false,
            fn (Builder $query, $search) =>
                $query->where('title', 'like', '%' . $search . '%')
        );

        // filter berdasarkan slug kategori
        $query->when(
            $filters['category'] ?? false,
            fn (Builder $query, $category) => $query->whereHas('category', fn ($query) =>
                    $query->where('slug', $category)
                )
        );

        // filter berdasarkan slug author
        $query->when(
            $filters['author'] ?? false,
            fn (Builder $query, $author) => $query->whereHas('author', fn ($query) =>
                    $query->where('username', $author)
                )
        );
    }
}