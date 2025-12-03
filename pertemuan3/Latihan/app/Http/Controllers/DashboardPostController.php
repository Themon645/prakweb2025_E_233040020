<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DashboardPostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // menggunakan user_id dari user yang sedang login
        $posts = Post::where('user_id', Auth::id());

        // fitur search
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        // menampilkan 5 data perhalaman dengan pagination
        return view('dashboard.index', ['posts' => $posts->paginate(5)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
    {
        // Ambil semua categories
        $categories = Category::all();

        return view('dashboard.create', compact('categories'));
    }

    //-------------------------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input (dengan pesan berbahasa Indonesia)
        $validated = $request->validate([
            'title'        => 'required|max:255',
            'category_id'  => 'required|exists:categories,id',
            'excerpt'      => 'required',
            'body'         => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'title.required'        => 'Judul wajib diisi.',
            'title.max'             => 'Judul tidak boleh lebih dari 255 karakter.',
            'category_id.required'  => 'Kategori wajib dipilih.',
            'category_id.exists'    => 'Kategori yang dipilih tidak valid.',
            'excerpt.required'      => 'Excerpt wajib diisi.',
            'body.required'         => 'Konten/Body wajib diisi.',
            'image.image'           => 'File harus berupa gambar.',
            'image.mimes'           => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max'             => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Generate slug dari title dan pastikan unik
        $slug = Str::slug($validated['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Simpan post
        Post::create([
            'title'        => $validated['title'],
            'slug'         => $slug,
            'category_id'  => $validated['category_id'],
            'excerpt'      => $validated['excerpt'],
            'body'         => $validated['body'],
            'image'        => $imagePath,
            'user_id'      => Auth::id(),
        ]);

        return redirect()
            ->route('dashboard.posts.index')
            ->with('success', 'Post berhasil dibuat!');

        // jika validasi gagal, redirect kembali dengan pesan error 
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator) // mengirimkan semua pesan eror kembali
                ->withInput(); // mengirimkan semua data yang sudah di input (old data)
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('dashboard.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $validated = $request->validate([
            'title'        => 'required|max:255',
            'category_id'  => 'required|exists:categories,id',
            'excerpt'      => 'required',
            'body'         => 'required',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Slug hanya diubah bila judul berubah
        if ($validated['title'] !== $post->title) {
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $post->slug = $slug;
        }

        // Ganti gambar jika ada upload baru
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
            $post->image = $imagePath;
        }

        $post->title = $validated['title'];
        $post->category_id = $validated['category_id'];
        $post->excerpt = $validated['excerpt'];
        $post->body = $validated['body'];
        $post->save();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('dashboard.posts.index')->with('success', 'Post berhasil dihapus!');
    }

}
