<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar transaksi keuangan pribadi SpendWise.">
    <title>Transaksi — SpendWise</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="dashboard-page">
    <a class="skip-link" href="#main-content">Langsung ke isi</a>
    <aside class="sidebar" id="sidebar" aria-label="Menu SpendWise" data-sidebar>
        <header class="sidebar-header">
            <a class="brand" href="{{ route('dashboard') }}">SpendWise</a>
            <button class="menu-close" type="button" data-sidebar-close>Tutup</button>
        </header>
        <nav class="main-nav" aria-label="Navigasi utama">
            <p class="section-label">Keuangan</p>
            <ul>
                <li><a href="{{ route('dashboard') }}">Ringkasan</a></li>
                <li><a class="active" href="{{ route('transactions') }}">Transaksi<span class="nav-count">8</span></a></li>
                <li><a href="#">Budget</a></li>
                <li><a href="#">Analisis</a></li>
                <li><a href="#">Laporan</a></li>
            </ul>
            <p class="section-label">Akun</p>
            <ul>
                <li><a href="{{ route('profile') }}">Profil saya</a></li>
                <li><button type="button" data-demo-link>Pengaturan</button></li>
            </ul>
        </nav>
        <footer class="sidebar-footer">
            <button class="text-button" type="button" data-demo-link>Pusat bantuan</button>
            <a href="{{ route('login') }}">Keluar</a>
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
                <a href="{{ route('profile') }}">Raka Aditya</a>
            </nav>
        </header>
        <main class="dashboard-content" id="main-content" tabindex="-1">
            <header class="page-heading" id="overview" tabindex="-1">
                <div>
                    <p class="section-label">September 2026</p>
                    <h1>Transaksi</h1>
                    <p>Kelola seluruh pemasukan dan pengeluaranmu.</p>
                </div>
                <button class="button primary-button" type="button" data-modal-open>Tambah transaksi</button>
            </header>
            <section class="panel" id="transactions" tabindex="-1" aria-labelledby="transactions-title">
                <header class="panel-heading">
                    <div><h2 id="transactions-title">Daftar transaksi</h2><p>Semua transaksi bulan September 2026.</p></div>
                    <div class="transaction-filter">
                        <button class="button primary-button" type="button">Semua</button>
                        <button class="button" type="button">Pemasukan</button>
                        <button class="button" type="button">Pengeluaran</button>
                    </div>
                </header>
                <div class="table-scroll" tabindex="0" role="region" aria-label="Tabel semua transaksi">
                    <table>
                        <caption class="sr-only">Semua transaksi September 2026</caption>
                        <thead><tr><th scope="col">Transaksi</th><th scope="col">Kategori</th><th scope="col">Tanggal</th><th scope="col" class="amount">Jumlah</th><th scope="col"><span class="sr-only">Tindakan</span></th></tr></thead>
                        <tbody>
                            <tr><th scope="row">Makan siang<small>QRIS · Warung Nusantara</small></th><td>Makanan</td><td><time datetime="2026-09-30">30 Sep</time></td><td class="amount">-Rp32.000</td><td><button class="text-button" type="button" data-demo-link>Opsi</button></td></tr>
                            <tr><th scope="row">Freelance Design<small>Transfer · Bank Jago</small></th><td>Pemasukan</td><td><time datetime="2026-09-29">29 Sep</time></td><td class="amount">+Rp850.000</td><td><button class="text-button" type="button" data-demo-link>Opsi</button></td></tr>
                            <tr><th scope="row">Ojek ke kampus<small>GoPay · GoRide</small></th><td>Transportasi</td><td><time datetime="2026-09-29">29 Sep</time></td><td class="amount">-Rp18.500</td><td><button class="text-button" type="button" data-demo-link>Opsi</button></td></tr>
                            <tr><th scope="row">Print modul kuliah<small>Tunai · Fotokopi Sahabat</small></th><td>Pendidikan</td><td><time datetime="2026-09-28">28 Sep</time></td><td class="amount">-Rp45.000</td><td><button class="text-button" type="button" data-demo-link>Opsi</button></td></tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="panel" tabindex="-1" aria-labelledby="summary-title">
                <header class="panel-heading"><div><h2 id="summary-title">Ringkasan transaksi</h2><p>Performa transaksi bulan September 2026.</p></div></header>
                <dl class="balance-summary">
                    <div><dt>Total pemasukan</dt><dd class="stat-value">Rp5.200.000</dd><dd class="stat-note">2 transaksi pemasukan bulan ini.</dd></div>
                    <div><dt>Total pengeluaran</dt><dd class="stat-value">Rp2.360.000</dd><dd class="stat-note">18 transaksi pengeluaran bulan ini.</dd></div>
                    <div><dt>Total transaksi</dt><dd class="stat-value">20 transaksi</dd><dd class="stat-note">Semua aktivitas keuangan bulan ini.</dd></div>
                </dl>
            </section>
        </main>
        <footer class="dashboard-footer"><p>© 2026 SpendWise</p><nav aria-label="Informasi"><button class="text-button" type="button" data-demo-link>Privasi</button><button class="text-button" type="button" data-demo-link>Bantuan</button></nav></footer>
    </div>
    <dialog class="transaction-dialog" aria-labelledby="modal-title" data-modal>
        <header class="dialog-heading"><h2 id="modal-title">Tambah transaksi</h2><button class="text-button" type="button" aria-label="Tutup modal" data-modal-close>Tutup</button></header>
        <form class="transaction-form" data-transaction-form>
            <fieldset class="transaction-type">
                <legend>Jenis transaksi</legend>
                <label><input type="radio" name="type" value="expense" checked> Pengeluaran</label>
                <label><input type="radio" name="type" value="income"> Pemasukan</label>
            </fieldset>
            <div class="field"><label for="amount">Jumlah (Rp)</label><input id="amount" name="amount" type="number" min="1" step="1" inputmode="numeric" placeholder="0" required></div>
            <div class="form-grid">
                <div class="field"><label for="category">Kategori</label><select id="category" name="category" required><option value="">Pilih kategori</option><option>Makanan</option><option>Transportasi</option><option>Pendidikan</option><option>Hiburan</option><option>Lainnya</option></select></div>
                <div class="field"><label for="date">Tanggal</label><input id="date" name="date" type="date" value="2026-09-30" required></div>
            </div>
            <div class="field"><label for="note">Catatan</label><input id="note" name="note" type="text" placeholder="Contoh: Makan siang di kantin" required></div>
            <p class="form-note">Form contoh. Transaksi belum disimpan ke database.</p>
            <footer class="dialog-actions"><button class="button" type="button" data-modal-close>Batal</button><button class="button primary-button" type="submit">Simpan transaksi</button></footer>
        </form>
    </dialog>
    <p class="toast" role="status" aria-live="polite" data-toast></p>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>