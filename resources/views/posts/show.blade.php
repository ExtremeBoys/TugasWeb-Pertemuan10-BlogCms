@extends('layouts.app')

@section('title', $post->title . ' - Tugas Rutin 10')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="mb-4">
        <a href="{{ route('posts.index') }}" class="text-sm text-teal-600 hover:underline">&larr; Kembali ke Semua Artikel</a>
    </div>

    <x-card :title="$post->title" :subtitle="'Ditulis oleh ' . $post->author . ' pada ' . $post->created_at->format('d F Y, H:i') . ' WIB'">
        <div class="space-y-6">
            @if ($post->image)
                <div class="w-full max-h-96 rounded-lg overflow-hidden border border-slate-200 bg-slate-100">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="text-base text-slate-700 leading-relaxed whitespace-pre-line">
                {{ $post->content }}
            </div>
        </div>

        <x-slot:footer>
            <span class="text-xs text-slate-400">Slug: {{ $post->slug }}</span>

            <div class="flex items-center gap-2">
                <a href="{{ route('posts.edit', $post) }}" class="px-3.5 py-1.5 bg-sky-50 text-sky-700 border border-sky-200 rounded text-xs font-medium hover:bg-sky-100 transition">
                    Edit Artikel
                </a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3.5 py-1.5 bg-red-50 text-red-700 border border-red-200 rounded text-xs font-medium hover:bg-red-100 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </x-slot:footer>
    </x-card>
</div>
@endsection
