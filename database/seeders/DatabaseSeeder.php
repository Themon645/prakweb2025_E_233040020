<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\category;
use App\Models\post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 5 users
        $users = [
            ['name' => 'John Doe', 'username' => 'johndoe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'username' => 'janesmith', 'email' => 'jane@example.com'],
            ['name' => 'Bob Wilson', 'username' => 'bobwilson', 'email' => 'bob@example.com'],
            ['name' => 'Alice Brown', 'username' => 'alicebrown', 'email' => 'alice@example.com'],
            ['name' => 'Charlie Davis', 'username' => 'charliedavis', 'email' => 'charlie@example.com'],
        ];

        foreach ($users as $userData) {
            User::create([
                'name' => $userData['name'],
                'username' => $userData['username'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
            ]);
        }

        // Membuat 2 categories
        $categories = [
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Lifestyle', 'slug' => 'lifestyle'],
        ];

        foreach ($categories as $categoryData) {
            category::create($categoryData);
        }

        // Membuat 10 posts
        $posts = [
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'Introduction to Laravel Framework',
                'slug' => 'introduction-to-laravel-framework',
                'excerpt' => 'Learn the basics of Laravel, a powerful PHP framework for web artisans.',
                'body' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.',
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'Getting Started with Tailwind CSS',
                'slug' => 'getting-started-with-tailwind-css',
                'excerpt' => 'Discover how Tailwind CSS can speed up your development workflow.',
                'body' => 'Tailwind CSS is a utility-first CSS framework packed with classes that can be composed to build any design, directly in your markup. It provides low-level utility classes that let you build completely custom designs without ever leaving your HTML.',
            ],
            [
                'user_id' => 3,
                'category_id' => 1,
                'title' => 'Understanding PHP 8 Features',
                'slug' => 'understanding-php-8-features',
                'excerpt' => 'Explore the new features and improvements in PHP 8.',
                'body' => 'PHP 8 introduces several new features and improvements including named arguments, union types, attributes, constructor property promotion, and the JIT compiler. These features make PHP more powerful and efficient.',
            ],
            [
                'user_id' => 4,
                'category_id' => 2,
                'title' => 'Healthy Living Tips for Developers',
                'slug' => 'healthy-living-tips-for-developers',
                'excerpt' => 'Stay healthy while working as a software developer.',
                'body' => 'As developers, we often spend long hours sitting at our desks. It is important to maintain a healthy lifestyle by taking regular breaks, exercising, eating well, and getting enough sleep. Your health is your most important asset.',
            ],
            [
                'user_id' => 5,
                'category_id' => 2,
                'title' => 'Work-Life Balance in Tech Industry',
                'slug' => 'work-life-balance-in-tech-industry',
                'excerpt' => 'Finding balance between work and personal life in the fast-paced tech world.',
                'body' => 'Achieving work-life balance in the tech industry can be challenging. Set boundaries, prioritize tasks, learn to say no, and make time for hobbies and relationships. Remember that sustainable productivity comes from being well-rested and happy.',
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'title' => 'Database Design Best Practices',
                'slug' => 'database-design-best-practices',
                'excerpt' => 'Learn how to design efficient and scalable databases.',
                'body' => 'Good database design is crucial for application performance. Follow normalization principles, use appropriate data types, create proper indexes, and plan for scalability from the start. A well-designed database can make or break your application.',
            ],
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'RESTful API Development Guide',
                'slug' => 'restful-api-development-guide',
                'excerpt' => 'Master the art of building RESTful APIs.',
                'body' => 'RESTful APIs are the backbone of modern web applications. Learn about HTTP methods, status codes, authentication, versioning, and documentation. A well-designed API is intuitive, consistent, and easy to use.',
            ],
            [
                'user_id' => 3,
                'category_id' => 2,
                'title' => 'Productivity Hacks for Remote Workers',
                'slug' => 'productivity-hacks-for-remote-workers',
                'excerpt' => 'Boost your productivity while working from home.',
                'body' => 'Remote work offers flexibility but requires discipline. Create a dedicated workspace, stick to a schedule, use productivity tools, minimize distractions, and communicate effectively with your team. The right habits can make remote work highly productive.',
            ],
            [
                'user_id' => 4,
                'category_id' => 1,
                'title' => 'Version Control with Git',
                'slug' => 'version-control-with-git',
                'excerpt' => 'Essential Git commands and workflows every developer should know.',
                'body' => 'Git is an essential tool for modern development. Learn branching strategies, commit best practices, how to resolve conflicts, and collaborative workflows. Mastering Git will make you a more effective developer and team player.',
            ],
            [
                'user_id' => 5,
                'category_id' => 2,
                'title' => 'Minimalist Lifestyle for Developers',
                'slug' => 'minimalist-lifestyle-for-developers',
                'excerpt' => 'Simplify your life and focus on what truly matters.',
                'body' => 'Minimalism is about eliminating distractions and focusing on what adds value to your life. Apply this principle to your code, your workspace, and your daily routines. Less clutter means more focus, creativity, and peace of mind.',
            ],
        ];

        foreach ($posts as $postData) {
            post::create($postData);
        }
    }
}

