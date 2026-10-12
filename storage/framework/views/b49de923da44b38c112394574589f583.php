<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kelola informasi akun SpendWise.">
    <title>Profil — SpendWise</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body class="dashboard-page">
    <a class="skip-link" href="#main-content">Langsung ke isi</a>
    <aside class="sidebar" id="sidebar" aria-label="Menu SpendWise" data-sidebar>
        <header class="sidebar-header">
            <a class="brand" href="<?php echo e(route('dashboard')); ?>">SpendWise</a>
            <button class="menu-close" type="button" data-sidebar-close>Tutup</button>
        </header>
        <nav class="main-nav" aria-label="Navigasi utama">
            <p class="section-label">Keuangan</p>
            <ul>
                <li><a href="<?php echo e(route('dashboard')); ?>">Ringkasan</a></li>
                <li><a href="<?php echo e(route('transactions')); ?>">Transaksi<span class="nav-count">8</span></a></li>
                <li><a href="#">Budget</a></li>
                <li><a href="#">Analisis</a></li>
                <li><a href="#">Laporan</a></li>
            </ul>
            <p class="section-label">Akun</p>
            <ul>
                <li><a class="active" href="<?php echo e(route('profile')); ?>" aria-current="page">Profil saya</a></li>
                <li><button type="button" data-demo-link>Pengaturan</button></li>
            </ul>
        </nav>
        <footer class="sidebar-footer">
            <button class="text-button" type="button" data-demo-link>Pusat bantuan</button>
            <a href="<?php echo e(route('login')); ?>">Keluar</a>
        </footer>
    </aside>
    <button class="sidebar-backdrop" type="button" aria-label="Tutup menu" data-sidebar-close hidden></button>
    <div class="workspace">
        <header class="topbar">
            <div class="topbar-left">
                <button class="button menu-open" type="button" aria-controls="sidebar" aria-expanded="false" data-sidebar-open>Menu</button>
                <p>Rabu, <time datetime="2026-09-30">30 September 2026</time></p>
            </div>
            <nav class="account-nav" aria-label="Akun dan periode">
                <button type="button" data-demo-link>September 2026</button>
                <button type="button" data-demo-link>Notifikasi</button>
                <a href="<?php echo e(route('profile')); ?>" aria-current="page">Raka Aditya</a>
            </nav>
        </header>
        <main class="dashboard-content" id="main-content" tabindex="-1">
            <header class="page-heading">
                <div>
                    <p class="section-label">Akun</p>
                    <h1>Profil saya</h1>
                    <p>Kelola informasi pribadi dan keamanan akunmu.</p>
                </div>
            </header>
            <div class="profile-layout">
                <div class="profile-column">
                    <section class="profile-panel" aria-labelledby="personal-info-title">
                        <header class="panel-heading">
                            <div>
                                <h2 id="personal-info-title">Informasi pribadi</h2>
                                <p>Informasi ini membantu menjaga akunmu tetap personal.</p>
                            </div>
                        </header>
                        <div class="profile-identity">
                            <div class="profile-avatar" aria-label="Inisial Raka Aditya" data-profile-avatar>RA</div>
                            <div>
                                <h2>Raka Aditya</h2>
                                <p>Anggota SpendWise</p>
                            </div>
                        </div>
                        <form data-profile-form>
                            <div class="profile-fields">
                                <div class="field">
                                    <label for="profile-name">Nama lengkap</label>
                                    <input id="profile-name" name="name" type="text" value="Raka Aditya" autocomplete="name" required>
                                </div>
                                <div class="field">
                                    <label for="profile-email">Alamat email</label>
                                    <input id="profile-email" name="email" type="email" value="mahasiswa@kampus.ac.id" autocomplete="email" required>
                                </div>
                            </div>
                            <div class="profile-photo-field">
                                <label class="button" for="profile-photo">Pilih foto</label>
                                <input id="profile-photo" name="photo" type="file" accept="image/*" data-profile-photo>
                                <p>JPG, PNG, atau GIF · Maks. 5 MB</p>
                            </div>
                            <p class="form-note">Perubahan hanya pratinjau dan tidak disimpan di versi contoh.</p>
                            <div class="profile-actions">
                                <button class="button primary-button" type="submit">Simpan perubahan</button>
                            </div>
                        </form>
                    </section>
                    <section class="profile-panel" aria-labelledby="password-title">
                        <header class="panel-heading">
                            <div>
                                <h2 id="password-title">Ubah kata sandi</h2>
                                <p>Gunakan kata sandi yang kuat dan tidak mudah ditebak.</p>
                            </div>
                        </header>
                        <p class="profile-security-note">Jangan gunakan kata sandi yang sama dengan akun lain.</p>
                        <form class="profile-fields" data-password-form>
                            <div class="field">
                                <label for="current-password">Kata sandi saat ini</label>
                                <input id="current-password" name="current_password" type="password" autocomplete="current-password" required>
                            </div>
                            <div class="field">
                                <label for="new-password">Kata sandi baru</label>
                                <input id="new-password" name="new_password" type="password" minlength="8" autocomplete="new-password" required>
                            </div>
                            <div class="field">
                                <label for="confirm-password">Konfirmasi kata sandi baru</label>
                                <input id="confirm-password" name="new_password_confirmation" type="password" minlength="8" autocomplete="new-password" required>
                            </div>
                            <p class="form-note">Minimal 8 karakter. Kata sandi tidak diubah di versi contoh.</p>
                            <div class="profile-actions">
                                <button class="button primary-button" type="submit">Perbarui kata sandi</button>
                            </div>
                        </form>
                    </section>
                </div>
                <aside class="profile-summary" aria-labelledby="account-summary-title">
                    <p class="section-label">Akun SpendWise</p>
                    <h2 id="account-summary-title">Keuanganmu, tetap personal.</h2>
                    <p>Pastikan informasi akunmu selalu terbaru agar pengalaman mengatur keuangan terasa lebih nyaman.</p>
                    <dl>
                        <div><dt>Nama akun</dt><dd>Raka Aditya</dd></div>
                        <div><dt>Email terdaftar</dt><dd>mahasiswa@kampus.ac.id</dd></div>
                        <div><dt>Status profil</dt><dd>Informasi akun</dd></div>
                    </dl>
                    <a class="text-button" href="<?php echo e(route('login')); ?>">Keluar dari akun</a>
                </aside>
            </div>
        </main>
        <footer class="dashboard-footer"><p>© 2026 SpendWise</p><nav aria-label="Informasi"><button class="text-button" type="button" data-demo-link>Privasi</button><button class="text-button" type="button" data-demo-link>Bantuan</button></nav></footer>
    </div>
    <p class="toast" role="status" aria-live="polite" data-toast></p>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH C:\Users\nicho\OneDrive\Documents\WebDev Project\SpendWise-money-tracker-\resources\views/profile.blade.php ENDPATH**/ ?>