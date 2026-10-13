@extends('layouts.app')

@section('title', 'Daftar Artikel Blog - Tugas Rutin 10')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 border border-slate-200 rounded-lg shadow-sm">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Artikel Blog</h1>
            <p class="text-sm text-slate-500">Kelola dan baca seluruh artikel dengan Route Model Binding dan Pagination.</p>
        </div>

        <form action="{{ route('posts.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
            <input type="text" name="cari" placeholder="Cari judul, penulis, isi..." value="{{ request('cari') }}" class="px-3 py-2 border border-slate-300 rounded text-sm w-full md:w-64 focus:outline-none focus:border-teal-500">
            <button type="submit" class="px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white rounded text-sm font-medium">Cari</button>
            @if (request('cari'))
                <a href="{{ route('posts.index') }}" class="px-3 py-2 bg-slate-100 border border-slate-300 text-slate-700 rounded text-sm hover:bg-slate-200">Reset</a>
            @endif
        </form>
    </div>

    @if ($posts->count() > 0)
        <div class="space-y-4">
            @foreach ($posts as $post)
                <x-card :title="$post->title" :subtitle="'Penulis: ' . $post->author . ' • ' . $post->created_at->format('d M Y')">
                    <div class="flex flex-col md:flex-row gap-5 items-start">
                        @if ($post->image)
                            <div class="w-full md:w-48 h-32 flex-shrink-0 bg-slate-100 rounded border border-slate-200 overflow-hidden">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif

                        <div class="flex-grow space-y-2">
                            <p class="text-sm text-slate-600 line-clamp-3 leading-relaxed">
                                {{ $post->content }}
                            </p>
                        </div>
                    </div>

                    <x-slot:footer>
                        <a href="{{ route('posts.show', $post) }}" class="text-teal-600 hover:underline font-semibold text-xs">
                            Baca Selengkapnya &rarr;
                        </a>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('posts.edit', $post) }}" class="px-3 py-1 bg-sky-50 text-sky-700 border border-sky-200 rounded text-xs font-medium hover:bg-sky-100 transition">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-50 text-red-700 border border-red-200 rounded text-xs font-medium hover:bg-red-100 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </x-slot:footer>
                </x-card>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @else
        <div class="text-center py-12 bg-white border border-slate-200 rounded-lg text-slate-500">
            Tidak ada postingan yang ditemukan.
        </div>
    @endif
</div>
@endsection
