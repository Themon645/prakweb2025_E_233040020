<x-layout title="Daftar Posts">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Daftar Posts</h1>

    <div class="space-y-6">
        @foreach ($posts as $post)
            <article class="border-b border-gray-200 pb-6 last:border-b-0">
                <h2 class="text-2xl font-semibold mb-3">
                    <a href="/posts/{{ $post->slug }}" class="text-indigo-600 hover:text-indigo-800 transition duration-200">
                        {{ $post->title }}
                    </a>
                </h2>
                <div class="flex items-center text-sm text-gray-600 mb-3">
                    @if($post->author)
                    <span class="mr-4">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                        {{ $post->author->name }}
                    </span>
                    @endif
                    <span class="mr-4">
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        {{ $post->created_at->format('d M Y') }}
                    </span>
                    @if($post->category)
                    <span>
                        <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                        </svg>
                        {{ $post->category->name }}
                    </span>
                    @endif
                </div>
                <p class="text-gray-700 leading-relaxed">{{ $post->excerpt }}</p>
                <a href="/posts/{{ $post->slug }}" class="inline-block mt-3 text-indigo-600 hover:text-indigo-800 font-medium">
                    Baca Selengkapnya →
                </a>
            </article>
        @endforeach
    </div>
</x-layout>