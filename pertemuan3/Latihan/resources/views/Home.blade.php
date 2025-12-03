<x-dashboard-layout :title="'Halaman Beranda'">
    <section class="container mx-auto max-w-5xl px-6">
        <div class="bg-white rounded-xl shadow-md p-10 space-y-6">
            <header class="space-y-2">
                <h1 class="text-3xl md:text-4xl font-semibold text-gray-900">Selamat Datang di Website Kami</h1>
                <p class="text-gray-600">Jelajahi postingan, kategori, dan kelola konten Anda dengan mudah.</p>
            </header>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('posts.index') }}" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg">Lihat Postingan</a>
                <a href="{{ route('categories.index') }}" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-800 text-white font-medium rounded-lg">Lihat Kategori</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-slate-500 hover:bg-slate-600 text-white font-medium rounded-lg">Masuk Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-slate-500 hover:bg-slate-600 text-white font-medium rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 border border-gray-300 hover:bg-gray-50 text-gray-900 font-medium rounded-lg">Daftar</a>
                @endauth
            </div>
        </div>
    </section>
</x-dashboard-layout>