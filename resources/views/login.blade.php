<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Catatan pemasukan, pengeluaran, dan anggaran pribadi.">
    <title>Masuk — SpendWise</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="login-page">
    <header class="login-header">
        <a class="brand" href="{{ route('login') }}">SpendWise</a>
        <p>Catatan keuangan pribadi</p>
    </header>
    <main class="login-main">
        <section class="login-intro" aria-labelledby="intro-title">
            <p class="section-label">Pemasukan / Pengeluaran / Anggaran</p>
            <h1 id="intro-title">Catatan uang,<br>bulan demi bulan.</h1>
            <p>Lihat transaksi, periksa sisa saldo, dan atur anggaran dalam satu tempat.</p>
            <p class="login-period">September 2026</p>
        </section>
        <section class="login-panel" aria-labelledby="login-title">
            <header>
                <h2 id="login-title">Masuk ke akunmu</h2>
                <p>Gunakan alamat email dan kata sandi.</p>
            </header>
            <form class="auth-form" action="{{ route('dashboard') }}" method="GET" data-login-form>
                <div class="field">
                    <label for="email">Alamat email</label>
                    <input type="email" id="email" name="email" value="mahasiswa@kampus.ac.id" placeholder="nama@kampus.ac.id" autocomplete="email" required>
                </div>
                <div class="field">
                    <div class="field-label">
                        <label for="password">Kata sandi</label>
                        <button class="text-button" type="button" data-demo-link>Lupa kata sandi?</button>
                    </div>
                    <div class="password-field">
                        <input type="password" id="password" value="spendwise" autocomplete="current-password" required>
                        <button type="button" aria-label="Tampilkan kata sandi" aria-controls="password" aria-pressed="false" data-password-toggle>Lihat</button>
                    </div>
                </div>
                <label class="check-field"><input type="checkbox" name="remember" checked> Ingat saya di perangkat ini</label>
                <button class="button primary-button" type="submit">Masuk</button>
            </form>
            <p class="register-note">Belum punya akun? <button class="text-button" type="button" data-demo-link>Daftar</button></p>
            <p class="form-note">Akun contoh sudah diisi. Tekan Masuk untuk membuka dashboard.</p>
        </section>
    </main>
    <footer class="login-footer"><p>© 2026 SpendWise</p></footer>
    <p class="toast" role="status" aria-live="polite" data-toast></p>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
