<x-layout title="Semua Kategori">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Semua Kategori</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($categories as $category)
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg shadow-lg hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <a href="/categories/{{ $category->slug }}" class="block p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold">{{ $category->name }}</h2>
                        <svg class="w-8 h-8 opacity-75" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm bg-white bg-opacity-25 px-3 py-1 rounded-full">
                            {{ $category->posts->count() }} Posts
                        </span>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @if($categories->isEmpty())
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
            <p class="text-gray-600 text-lg">Belum ada kategori tersedia.</p>
        </div>
    @endif
</x-layout>
