<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- Tambahkan slot baru dengan nama $title --}}
  <title>{{ $title }}</title>
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  {{-- Navigation --}}
  <nav class="bg-blue-600 text-white shadow-lg">
    <div class="container mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <div class="text-xl font-bold">
          My Laravel App
        </div>
        <div class="flex space-x-6">
          <a href="/" class="hover:text-blue-200 transition duration-300">Home</a>
          <a href="/about" class="hover:text-blue-200 transition duration-300">About</a>
          <a href="/posts" class="hover:text-blue-200 transition duration-300">Posts</a>
          <a href="/categories" class="hover:text-blue-200 transition duration-300">Categories</a>
          <a href="/blog" class="hover:text-blue-200 transition duration-300">Blog</a>
          <a href="/contact" class="hover:text-blue-200 transition duration-300">Contact</a>
        </div>
      </div>
    </div>
  </nav>

  {{-- Main Content --}}
  <main class="flex-grow container mx-auto px-4 py-8">
    {{ $slot }}
  </main>

  {{-- Footer --}}
  <footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 py-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Column 1 --}}
        <div>
          <h3 class="text-lg font-semibold mb-3">About Us</h3>
          <p class="text-gray-400 text-sm">
            Laravel learning project for web programming course. Building modern web applications with Laravel framework.
          </p>
        </div>
        
        {{-- Column 2 --}}
        <div>
          <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="/" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
            <li><a href="/about" class="text-gray-400 hover:text-white transition duration-300">About</a></li>
            <li><a href="/blog" class="text-gray-400 hover:text-white transition duration-300">Blog</a></li>
            <li><a href="/contact" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
          </ul>
        </div>
        
        {{-- Column 3 --}}
        <div>
          <h3 class="text-lg font-semibold mb-3">Contact Info</h3>
          <ul class="space-y-2 text-sm text-gray-400">
            <li>Email: info@example.com</li>
            <li>Phone: +62 123 4567 890</li>
            <li>Address: Bandung, Indonesia</li>
          </ul>
        </div>
      </div>
      
      {{-- Copyright --}}
      <div class="border-t border-gray-700 mt-6 pt-6 text-center text-sm text-gray-400">
        <p>&copy; {{ date('Y') }} My Laravel App. All rights reserved.</p>
      </div>
    </div>
  </footer>
</body>
</html>