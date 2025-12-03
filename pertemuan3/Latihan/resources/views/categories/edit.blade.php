<x-dashboard-layout>
  <x-slot:title>Edit Kategori</x-slot:title>
  <form action="{{ route('categories.update', $category) }}" method="POST" class="max-w-md space-y-4">
    @csrf
    @method('PUT')
    <div>
      <label class="block mb-1">Nama</label>
      <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full border rounded p-2">
      @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>
    <div>
      <label class="block mb-1">Slug</label>
      <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full border rounded p-2">
      @error('slug')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>
    <div class="flex gap-3">
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
      <a href="{{ route('categories.index') }}" class="px-4 py-2 border rounded">Batal</a>
    </div>
  </form>
</x-dashboard-layout>
