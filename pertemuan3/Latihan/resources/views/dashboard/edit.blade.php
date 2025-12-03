<x-dashboard-layout>
  <x-slot:title>Edit Post</x-slot:title>
  <div class="max-w-2xl mx-auto">
    <div class="mb-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Post</h1>
    </div>
    <div class="relative bg-white border rounded p-4 md:p-6">
      <form action="{{ route('dashboard.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
          <label class="block mb-1">Judul</label>
          <input type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full border rounded p-2">
          @error('title')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
          <label class="block mb-1">Kategori</label>
          <select name="category_id" class="w-full border rounded p-2">
            @foreach($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
          @error('category_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
          <label class="block mb-1">Excerpt</label>
          <textarea name="excerpt" rows="3" class="w-full border rounded p-2">{{ old('excerpt', $post->excerpt) }}</textarea>
          @error('excerpt')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
          <label class="block mb-1">Body</label>
          <textarea name="body" rows="8" class="w-full border rounded p-2">{{ old('body', $post->body) }}</textarea>
          @error('body')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
          <label class="block mb-1">Gambar (opsional)</label>
          @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" class="w-full h-48 object-cover rounded mb-2" alt="Preview">
          @endif
          <input type="file" name="image" accept="image/*" class="w-full border rounded p-2">
          @error('image')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div class="flex gap-3">
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
          <a href="{{ route('dashboard.posts.index') }}" class="px-4 py-2 border rounded">Batal</a>
        </div>
      </form>
    </div>
  </div>
</x-dashboard-layout>
