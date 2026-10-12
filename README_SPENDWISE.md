# SpendWise — Frontend Laravel

Prototype pengelolaan keuangan dengan Laravel Blade, CSS biasa, dan JavaScript vanilla.

## Halaman

- `/` — masuk dan daftar dalam satu halaman.
- `/?mode=register` — membuka form daftar pada halaman yang sama.
- `/dashboard` — ringkasan keuangan.
- `/transactions` — daftar transaksi.

Form masuk dan daftar menggunakan POST, CSRF Laravel, dan validasi server. Project masih berupa demo: masuk yang valid membuka dashboard, sedangkan pendaftaran menampilkan konfirmasi tanpa membuat akun atau menyimpan kata sandi. Dashboard dan transaksi tetap memakai data contoh.

## Menjalankan project

1. Jalankan `composer install`.
2. Siapkan `.env` secara lokal sesuai konfigurasi tim; file ini tidak disimpan di GitHub.
3. Jalankan `php artisan key:generate` dan `php artisan serve`.
4. Buka `http://127.0.0.1:8000`.

CSS dan JavaScript kedua form dimuat langsung dari `public`. Tidak perlu React, paket frontend tambahan, atau build npm untuk halaman ini.

## Pengujian

Jalankan `php artisan test` untuk memeriksa halaman, validasi kedua form, konfirmasi kata sandi, serta memastikan kata sandi tidak disimpan sebagai input lama dalam session.
