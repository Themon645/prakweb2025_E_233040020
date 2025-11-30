@props(['title' => 'Judul Aplikasi Default'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $title }}</title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <nav class="bg-indigo-600 p-4 text-white shadow-md">
        <a href="{{ route('home') }}" class="mr-4 hover:text-indigo-200">Home</a>
        <a href="{{ route('about.us') }}" class="mr-4 hover:text-indigo-200">About</a>
        <a href="{{ route('blog') }}" class="mr-4 hover:text-indigo-200">Blog</a>
        <a href="{{ route('contact') }}" class="mr-4 hover:text-indigo-200">Contact</a>
        <a href="{{ route('posts.index') }}" class="mr-4 hover:text-indigo-200">Posts</a>
        <a href="{{ route('categories.index') }}" class="mr-4 hover:text-indigo-200">Categories</a>
    </nav>
    
    <main class="flex-grow p-8">
        <div class="bg-white p-6 rounded-lg shadow-xl">
            {{ $slot }}
        </div>
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center mt-auto">
        <p>&copy; {{ date('Y') }} Latihan Laravel. Dibuat dengan Tailwind CSS.</p>
    </footer>

</body>
</html>