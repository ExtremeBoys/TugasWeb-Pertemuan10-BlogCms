<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tugas Rutin 10 - Blog CRUD')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-5xl mx-auto px-4 py-4 flex flex-wrap justify-between items-center gap-4">
            <a href="{{ route('posts.index') }}" class="text-xl font-bold text-teal-600">BlogCRUD P10</a>
            <div class="flex items-center gap-4 text-sm font-medium">
                <a href="{{ route('posts.index') }}" class="hover:text-teal-600 transition">Semua Postingan</a>
                <a href="{{ route('posts.create') }}" class="px-3.5 py-1.5 bg-teal-600 text-white rounded hover:bg-teal-700 transition">+ Tulis Artikel</a>
            </div>
        </div>
    </nav>

    <main class="flex-grow max-w-5xl mx-auto px-4 py-8 w-full">
        @if (session('success'))
            <x-alert type="success" :message="session('success')" />
        @endif

        @if (session('error'))
            <x-alert type="danger" :message="session('error')" />
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 py-6 text-center text-sm text-slate-500">
        <p>&copy; 2026 Pemrograman Web - Tugas Rutin 10 Blog CRUD Laravel</p>
    </footer>
</body>
</html>
