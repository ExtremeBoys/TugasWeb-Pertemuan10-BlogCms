<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        $posts = Post::search($cari)->latest()->paginate(5)->withQueryString();

        return view('posts.index', compact('posts', 'cari'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'author' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ], [
            'title.required' => 'Judul artikel wajib diisi.',
            'title.max' => 'Judul maksimal 200 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'content.required' => 'Isi artikel tidak boleh kosong.',
            'image.image' => 'Berkas harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'author' => $validated['author'],
            'content' => $validated['content'],
            'image' => $imagePath
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan baru berhasil diterbitkan!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'author' => 'required|string|max:100',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ], [
            'title.required' => 'Judul artikel wajib diisi.',
            'title.max' => 'Judul maksimal 200 karakter.',
            'author.required' => 'Nama penulis wajib diisi.',
            'content.required' => 'Isi artikel tidak boleh kosong.',
            'image.image' => 'Berkas harus berupa gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan adalah jpeg, png, jpg, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . $post->id,
            'author' => $validated['author'],
            'content' => $validated['content'],
            'image' => $imagePath
        ]);

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Postingan berhasil dihapus (soft delete)!');
    }
}
