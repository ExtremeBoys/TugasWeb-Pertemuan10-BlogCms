@extends('layouts.app')

@section('title', 'Edit Artikel - Tugas Rutin 10')

@section('content')
<div class="max-w-2xl mx-auto">
    <x-card title="Edit Artikel Blog" :subtitle="'Memperbarui postingan: ' . $post->title">
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Judul Artikel</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full px-3 py-2 border @error('title') border-red-500 @else border-slate-300 @enderror rounded text-sm focus:outline-none focus:border-teal-500">
                @error('title')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author" class="block text-sm font-medium text-slate-700 mb-1">Nama Penulis</label>
                <input type="text" id="author" name="author" value="{{ old('author', $post->author) }}" class="w-full px-3 py-2 border @error('author') border-red-500 @else border-slate-300 @enderror rounded text-sm focus:outline-none focus:border-teal-500">
                @error('author')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-slate-700 mb-1">Isi Konten Artikel</label>
                <textarea id="content" name="content" rows="6" class="w-full px-3 py-2 border @error('content') border-red-500 @else border-slate-300 @enderror rounded text-sm focus:outline-none focus:border-teal-500">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-1">Ganti Gambar (Opsional)</label>
                @if ($post->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-24 rounded border border-slate-200 object-cover">
                        <p class="text-xs text-slate-500 mt-1">Gambar saat ini</p>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border @error('image') border-red-500 @else border-slate-300 @enderror rounded text-sm text-slate-600 bg-slate-50 focus:outline-none">
                @error('image')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-3 pt-3 border-t border-slate-100">
                <button type="submit" class="px-5 py-2.5 bg-teal-600 hover:bg-teal-700 text-white font-medium text-sm rounded transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('posts.index') }}" class="px-5 py-2.5 bg-slate-100 text-slate-700 font-medium text-sm rounded border border-slate-300 hover:bg-slate-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </x-card>
</div>
@endsection
