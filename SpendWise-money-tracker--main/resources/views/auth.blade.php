<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Masuk atau daftar untuk mencatat keuangan pribadi di SpendWise.">
    <title>{{ $register ? 'Daftar' : 'Masuk' }} — SpendWise</title>
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
        <section class="login-panel" aria-labelledby="auth-title">
            <nav class="auth-switch" aria-label="Pilihan akses akun">
                <a href="{{ route('login') }}" @if (!$register) aria-current="page" @endif>Masuk</a>
                <a href="{{ route('login', ['mode' => 'register']) }}" @if ($register) aria-current="page" @endif>Daftar</a>
            </nav>
            <header>
                <h2 id="auth-title">{{ $register ? 'Buat akun' : 'Masuk ke akunmu' }}</h2>
                <p>{{ $register ? 'Isi nama, alamat email, dan kata sandi.' : 'Gunakan alamat email dan kata sandi.' }}</p>
            </header>

            @if (session('status'))
                <p class="auth-message" role="status">{{ session('status') }}</p>
            @endif
            @if ($errors->any())
                <p class="auth-message" role="alert">Periksa kembali isian yang ditandai di bawah.</p>
            @endif

            <form class="auth-form" action="{{ route($register ? 'register.submit' : 'login.submit') }}" method="POST">
                @csrf
                @if ($register)
                    <div class="field">
                        <label for="name">Nama lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nama lengkap" autocomplete="name" maxlength="100" required @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                        @error('name') <p class="field-error" id="name-error">{{ $message }}</p> @enderror
                    </div>
                @endif
                <div class="field">
                    <label for="email">Alamat email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $register ? '' : 'mahasiswa@kampus.ac.id') }}" placeholder="nama@kampus.ac.id" autocomplete="email" maxlength="255" required @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                    @error('email') <p class="field-error" id="email-error">{{ $message }}</p> @enderror
                </div>
                <div class="field">
                    <div class="field-label">
                        <label for="password">Kata sandi</label>
                        @if (!$register)
                            <button class="text-button" type="button" data-demo-link>Lupa kata sandi?</button>
                        @endif
                    </div>
                    <div class="password-field">
                        <input id="password" name="password" type="password" value="{{ !$register && !$errors->any() ? 'spendwise' : '' }}" autocomplete="{{ $register ? 'new-password' : 'current-password' }}" maxlength="255" @if ($register) minlength="8" aria-describedby="password-help{{ $errors->has('password') ? ' password-error' : '' }}" @elseif ($errors->has('password')) aria-describedby="password-error" @endif required @error('password') aria-invalid="true" @enderror>
                        <button type="button" aria-label="Tampilkan kata sandi" aria-controls="password" aria-pressed="false" data-password-toggle>Lihat</button>
                    </div>
                    @if ($register) <p class="form-note" id="password-help">Minimal 8 karakter.</p> @endif
                    @error('password') <p class="field-error" id="password-error">{{ $message }}</p> @enderror
                </div>
                @if ($register)
                    <div class="field">
                        <label for="password-confirmation">Konfirmasi kata sandi</label>
                        <div class="password-field">
                            <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" maxlength="255" required @error('password_confirmation') aria-invalid="true" aria-describedby="confirmation-error" @enderror>
                            <button type="button" aria-label="Tampilkan konfirmasi kata sandi" aria-controls="password-confirmation" aria-pressed="false" data-password-toggle>Lihat</button>
                        </div>
                        @error('password_confirmation') <p class="field-error" id="confirmation-error">{{ $message }}</p> @enderror
                    </div>
                @else
                    <label class="check-field"><input type="checkbox" name="remember" value="1" @checked(old('remember', true))> Ingat saya di perangkat ini</label>
                @endif
                <button class="button primary-button" type="submit">{{ $register ? 'Daftar' : 'Masuk' }}</button>
            </form>
            <p class="register-note">
                @if ($register)
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                @else
                    Belum punya akun? <a href="{{ route('login', ['mode' => 'register']) }}">Daftar</a>
                @endif
            </p>
            <p class="form-note">Versi contoh: masuk membuka dashboard, pendaftaran belum membuat akun.</p>
        </section>
    </main>
    <footer class="login-footer"><p>© 2026 SpendWise</p></footer>
    <p class="toast" role="status" aria-live="polite" data-toast></p>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
