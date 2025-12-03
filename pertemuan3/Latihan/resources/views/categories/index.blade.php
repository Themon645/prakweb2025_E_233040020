<x-dashboard-layout>
  <x-slot:title>Categories</x-slot:title>
  <div class="flex justify-between mb-4">
    <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Kategori</a>
  </div>
  @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
  @endif
  <table class="w-full bg-white border rounded">
    <thead>
      <tr class="border-b">
        <th class="p-3 text-left">Nama</th>
        <th class="p-3 text-left">Slug</th>
        <th class="p-3 text-left">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($categories as $category)
        <tr class="border-b">
          <td class="p-3">{{ $category->name }}</td>
          <td class="p-3">{{ $category->slug }}</td>
          <td class="p-3">
            <a href="{{ route('categories.edit', $category) }}" class="text-blue-600">Edit</a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-600 ml-2">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td class="p-3" colspan="3">Belum ada kategori.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="mt-4">{{ $categories->links() }}</div>
</x-dashboard-layout>
