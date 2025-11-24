<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Categories</title>
</head>
<body>
  <x-Layout>
    <x-slot:title>
      Categories
    </x-slot:title>
    
    <div class="max-w-6xl mx-auto">
      <h1 class="text-4xl font-bold text-gray-800 mb-8">All Categories</h1>
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
          <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
            <div class="bg-linear-to-r from-blue-500 to-blue-600 p-6">
              <h2 class="text-2xl font-bold text-white">{{ $category->name }}</h2>
            </div>
            
            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-gray-600">
                  <svg class="inline w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                  </svg>
                  {{ $category->posts->count() }} Posts
                </span>
                <span class="text-xs text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                  {{ $category->slug }}
                </span>
              </div>
              
              @if($category->posts->count() > 0)
                <div class="border-t pt-4 mt-4">
                  <h3 class="text-sm font-semibold text-gray-700 mb-2">Recent Posts:</h3>
                  <ul class="space-y-2">
                    @foreach($category->posts->take(3) as $post)
                      <li class="text-sm text-gray-600 hover:text-blue-600 transition duration-300">
                        <a href="#" class="flex items-start">
                          <svg class="w-4 h-4 mr-2 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                          </svg>
                          <span class="line-clamp-2">{{ $post->title }}</span>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              @else
                <p class="text-sm text-gray-500 italic">No posts yet in this category</p>
              @endif
              
              <a href="#" class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium text-sm">
                View all posts in {{ $category->name }} →
              </a>
            </div>
          </div>
        @empty
          <div class="col-span-full text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No categories found</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new category.</p>
          </div>
        @endforelse
      </div>
    </div>
  </x-Layout>
</body>
</html>
