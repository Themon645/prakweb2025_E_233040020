@props(['categories'])

{{-- Form Body --}}
<form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="grid gap-4 grid-cols-2">

        {{-- Title --}}
        <div class="col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="bg-neutral-secondary-medium border border-default text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter post title">
        </div>

        {{-- Category --}}
        <div class="col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>
            <select name="category_id" id="category_id"
                class="block w-full p-3 py-2.5 bg-neutral-secondary-medium border border-default rounded-base focus:ring-brand focus:border-brand text-heading text-body shadow-xs">
                <option value="">Select category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Excerpt --}}
        <div class="col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>
            <textarea name="excerpt" id="excerpt" rows="3"
                class="block bg-neutral-secondary-medium border border-default rounded-base text-heading focus:ring-brand focus:border-brand text-body block w-full p-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Write a short description (excerpt)">{{ old('excerpt') }}</textarea>
        </div>

        {{-- Body --}}
        <div class="col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Body</label>
            <textarea name="body" id="body" rows="8"
                class="block bg-neutral-secondary-medium border border-default rounded-base text-heading focus:ring-brand focus:border-brand text-body block w-full p-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Write your post content">{{ old('body') }}</textarea>
        </div>

        {{-- Image Upload --}}
        <div class="col-span-2">
            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Post Image (Optional)</label>
            <input type="file" name="image" id="image" accept="image/*"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none p-2.5">
            <p class="mt-1 text-xs text-gray-500">Accepted: JPG, JPEG, PNG, GIF (Max: 2MB)</p>
        </div>

    </div>

    {{-- Buttons --}}
    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 mt-4 md:mt-6">
        
        {{-- Submit --}}
        <button type="submit"
            class="inline-flex items-center justify-center bg-brand text-white text-sm font-semibold rounded-base px-4 py-2.5 shadow-xs hover:bg-brand-hover focus:ring-4 focus:ring-brand/50 transition">
            Create
        </button>

        {{-- Cancel --}}
        <a href="{{ route('dashboard.posts.index') }}"
            class="text-body bg-neutral-secondary-medium px-4 py-2.5 rounded-base hover:bg-neutral-secondary transition">
            Cancel
        </a>
        {{-- Image Upload --}}
<div class="col-span-2">
    <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Upload Image</label>
    <input
        type="file"
        name="image"
        id="image"
        accept="image/png, image/jpeg, image/jpg"
        class="cursor-pointer bg-neutral-secondary-medium border text-heading text-sm 
               rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs 
               placeholder:text-body"
    >
</div>

    {{-- contoh --}}
    <div>
        @error('nama_field')
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
        {{-- implementasi paa field title --}}
        <div class="col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
                class="bg-neutral-secondary-medium border border-default text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter post title">
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        @error('nama_field') border-red-500 @enderror
        @error('nama_field') @else border-default @enderror
    </div>
</form>
