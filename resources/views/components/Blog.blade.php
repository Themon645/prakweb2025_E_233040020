<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blog</title>
</head>
<body>
  <x-Layout>
    <x-slot:title>
      Blog
    </x-slot:title>
    
    <div class="max-w-4xl mx-auto">
      <h1 class="text-4xl font-bold text-gray-800 mb-8">Blog</h1>
      
      <div class="space-y-6">
        {{-- Blog Post 1 --}}
        <article class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Getting Started with Laravel
          </h2>
          <p class="text-gray-600 text-sm mb-4">
            Published on January 15, 2025 by Admin
          </p>
          <p class="text-gray-700 leading-relaxed">
            Laravel is a powerful PHP framework that makes web development easier and more enjoyable. 
            In this post, we'll explore the basics of Laravel and how to get started with your first project.
          </p>
          <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">
            Read more →
          </a>
        </article>

        {{-- Blog Post 2 --}}
        <article class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Understanding Blade Templates
          </h2>
          <p class="text-gray-600 text-sm mb-4">
            Published on January 20, 2025 by Admin
          </p>
          <p class="text-gray-700 leading-relaxed">
            Blade is Laravel's powerful templating engine that allows you to create dynamic and reusable views. 
            Learn how to leverage Blade components and directives to build beautiful interfaces.
          </p>
          <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">
            Read more →
          </a>
        </article>

        {{-- Blog Post 3 --}}
        <article class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
          <h2 class="text-2xl font-semibold text-gray-800 mb-2">
            Tailwind CSS Integration
          </h2>
          <p class="text-gray-600 text-sm mb-4">
            Published on January 25, 2025 by Admin
          </p>
          <p class="text-gray-700 leading-relaxed">
            Tailwind CSS is a utility-first CSS framework that pairs perfectly with Laravel. 
            Discover how to integrate Tailwind into your Laravel project for rapid UI development.
          </p>
          <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">
            Read more →
          </a>
        </article>
      </div>
    </div>
  </x-Layout>
</body>
</html>
