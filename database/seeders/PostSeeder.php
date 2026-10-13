<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Memulai Perjalanan Web Development dengan Laravel 11',
                'slug' => 'memulai-perjalanan-web-development-dengan-laravel-11',
                'author' => 'Ahmad Fauzi',
                'content' => 'Laravel merupakan salah satu framework PHP paling populer karena sintaksnya yang ekspresif, ekosistem yang matang, serta kemudahan dalam mengatur database migration dan routing.',
                'image' => null,
            ],
            [
                'title' => 'Pentingnya Menerapkan Pola MVC dalam Pengembangan Perangkat Lunak',
                'slug' => 'pentingnya-menerapkan-pola-mvc-dalam-pengembangan-perangkat-lunak',
                'author' => 'Siti Rahma',
                'content' => 'Model-View-Controller memisahkan logika data, antarmuka pengguna, dan alur kontrol aplikasi agar kode lebih terstruktur, mudah diuji, dan scalable.',
                'image' => null,
            ],
            [
                'title' => 'Tips Mengelola Database Migration dan Seeder Secara Efisien',
                'slug' => 'tips-mengelola-database-migration-dan-seeder-secara-efisien',
                'author' => 'Budi Pratama',
                'content' => 'Database migration memungkinkan tim pengembang berbagi struktur skema basis data secara konsisten tanpa perlu ekspor-impor SQL manual antar anggota tim.',
                'image' => null,
            ],
            [
                'title' => 'Mengenal Route Model Binding pada Framework Modern',
                'slug' => 'mengenal-route-model-binding-pada-framework-modern',
                'author' => 'Rina Kartika',
                'content' => 'Route Model Binding menyederhanakan pengambilan entitas model langsung dari parameter URL, sehingga kita tidak perlu menulis query findOrFail secara manual di setiap controller method.',
                'image' => null,
            ],
            [
                'title' => 'Praktik Terbaik Pengamanan Formulir Web dengan Token CSRF',
                'slug' => 'praktik-terbaik-pengamanan-formulir-web-dengan-token-csrf',
                'author' => 'Dedi Setiawan',
                'content' => 'Cross-Site Request Forgery dapat dicegah dengan memastikan seluruh form pengiriman data menggunakan token keamanan unik yang divalidasi oleh web server.',
                'image' => null,
            ]
        ];

        foreach ($posts as $item) {
            Post::create($item);
        }
    }
}
