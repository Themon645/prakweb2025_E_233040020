<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 5 user dengan nama Indonesia
        $users = [
            ['name' => 'Budi Santoso', 'username' => 'budisantoso', 'email' => 'budi@example.com'],
            ['name' => 'Siti Nurhaliza', 'username' => 'sitinur', 'email' => 'siti@example.com'],
            ['name' => 'Ahmad Rizki', 'username' => 'ahmadrizki', 'email' => 'ahmad@example.com'],
            ['name' => 'Dewi Lestari', 'username' => 'dewi', 'email' => 'dewi@example.com'],
            ['name' => 'Andi Pratama', 'username' => 'andi', 'email' => 'andi@example.com'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
            ]);
        }

        // Membuat 2 kategori dengan slug
        $teknologi = Category::create(['name' => 'Teknologi', 'slug' => 'teknologi']);
        $kesehatan = Category::create(['name' => 'Kesehatan', 'slug' => 'kesehatan']);

        // Membuat 10 posts dengan konten Indonesia
        $posts = [
            ['title' => 'Perkembangan AI di Indonesia', 'category' => $teknologi->id, 'author' => 1],
            ['title' => 'Tips Menjaga Kesehatan Mental', 'category' => $kesehatan->id, 'author' => 2],
            ['title' => 'Revolusi Teknologi 5G', 'category' => $teknologi->id, 'author' => 3],
            ['title' => 'Manfaat Olahraga Rutin', 'category' => $kesehatan->id, 'author' => 4],
            ['title' => 'Keamanan Siber di Era Digital', 'category' => $teknologi->id, 'author' => 5],
            ['title' => 'Pola Makan Sehat', 'category' => $kesehatan->id, 'author' => 1],
            ['title' => 'Cloud Computing untuk Bisnis', 'category' => $teknologi->id, 'author' => 2],
            ['title' => 'Pentingnya Tidur Berkualitas', 'category' => $kesehatan->id, 'author' => 3],
            ['title' => 'Internet of Things', 'category' => $teknologi->id, 'author' => 4],
            ['title' => 'Yoga untuk Keseimbangan Hidup', 'category' => $kesehatan->id, 'author' => 5],
        ];

        foreach ($posts as $post) {
            Post::create([
                'title' => $post['title'],
                'slug' => \Illuminate\Support\Str::slug($post['title']),
                'user_id' => $post['author'],
                'category_id' => $post['category'],
                'excerpt' => 'Ringkasan artikel tentang ' . $post['title'],
                'body' => 'Konten lengkap artikel tentang ' . $post['title'] . '. Artikel ini memberikan informasi penting dan bermanfaat.',
            ]);
        }
    }
}
