<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dashboard pengelolaan keuangan pribadi SpendWise.">
    <title>Dashboard — SpendWise</title>
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
                <li><a class="active" href="#overview" aria-current="location">Ringkasan</a></li>
                <li><a href="#transactions">Transaksi <span class="nav-count">8</span></a></li>
                <li><a href="#budget">Budget</a></li>
                <li><a href="#analytics">Analisis</a></li>
                <li><a href="#report">Laporan</a></li>
            </ul>
            <p class="section-label">Akun</p>
            <ul>
                <li><button type="button" data-demo-link>Profil saya</button></li>
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
                <button type="button" data-demo-link>Raka Aditya</button>
            </nav>
        </header>
        <main class="dashboard-content" id="main-content" tabindex="-1">
            <header class="page-heading" id="overview" tabindex="-1">
                <div>
                    <p class="section-label">September 2026</p>
                    <h1>Ringkasan keuanganmu</h1>
                    <p>Pemasukan, pengeluaran, dan sisa anggaran bulan ini.</p>
                </div>
                <button class="button primary-button" type="button" data-modal-open>Tambah transaksi</button>
            </header>
            <section class="balance-summary" aria-label="Ringkasan saldo">
                <dl>
                    <div><dt>Saldo tersedia</dt><dd class="stat-value">Rp2.840.000</dd><dd class="stat-note">Naik 8,4% dari bulan lalu</dd></div>
                    <div><dt>Total pemasukan</dt><dd class="stat-value">Rp5.200.000</dd><dd class="stat-note">2 pemasukan · naik 5,2%</dd></div>
                    <div><dt>Total pengeluaran</dt><dd class="stat-value">Rp2.360.000</dd><dd class="stat-note">18 transaksi · naik 3,1%</dd></div>
                    <div><dt>Sisa budget</dt><dd class="stat-value">Rp1.140.000</dd><dd class="stat-note">67% dari Rp3.500.000 terpakai</dd></div>
                </dl>
            </section>
            <aside class="budget-alert" aria-label="Peringatan budget">
                <div><strong>Budget makanan hampir mencapai batas.</strong><p>Terpakai 85% dari Rp1.200.000. Sisa Rp180.000.</p></div>
                <a href="#budget">Lihat budget</a>
                <button class="text-button" type="button" aria-label="Tutup peringatan" data-alert-close>Tutup</button>
            </aside>
            <div class="dashboard-grid">
                <section class="panel" id="analytics" tabindex="-1" aria-labelledby="analytics-title">
                    <header class="panel-heading"><div><h2 id="analytics-title">Arus keuangan</h2><p>Pemasukan dan pengeluaran per minggu</p></div></header>
                    <figure class="cashflow">
                        <figcaption class="chart-legend">
                            <span><span class="legend-income" aria-hidden="true"></span>Pemasukan</span>
                            <span><span class="legend-expense" aria-hidden="true"></span>Pengeluaran</span>
                        </figcaption>
                        <div class="chart" role="img" aria-label="Arus keuangan September. Pemasukan minggu 1 sampai 4: Rp1.360.000, Rp980.000, Rp1.660.000, Rp1.200.000. Pengeluaran: Rp530.000, Rp730.000, Rp620.000, Rp480.000.">
                            <div class="chart-scale" aria-hidden="true"><span>2 jt</span><span>1 jt</span><span>0</span></div>
                            <div class="chart-columns" aria-hidden="true">
                                <div class="chart-week"><div class="bars"><span class="income-bar" style="height:68%"></span><span class="expense-bar" style="height:26.5%"></span></div><span>1–7 Sep</span></div>
                                <div class="chart-week"><div class="bars"><span class="income-bar" style="height:49%"></span><span class="expense-bar" style="height:36.5%"></span></div><span>8–14 Sep</span></div>
                                <div class="chart-week"><div class="bars"><span class="income-bar" style="height:83%"></span><span class="expense-bar" style="height:31%"></span></div><span>15–21 Sep</span></div>
                                <div class="chart-week"><div class="bars"><span class="income-bar" style="height:60%"></span><span class="expense-bar" style="height:24%"></span></div><span>22–30 Sep</span></div>
                            </div>
                        </div>
                    </figure>
                    <dl class="chart-summary">
                        <div><dt>Rata-rata pengeluaran</dt><dd>Rp78.667 <span>/ hari</span></dd></div>
                        <div><dt>Dibanding Agustus</dt><dd>Turun 6,8%</dd></div>
                    </dl>
                </section>
                <section class="panel" id="budget" tabindex="-1" aria-labelledby="budget-title">
                    <header class="panel-heading"><div><h2 id="budget-title">Budget kategori</h2><p>Penggunaan bulan ini</p></div><button class="text-button" type="button" aria-label="Pilihan budget" data-demo-link>Opsi</button></header>
                    <ul class="budget-list">
                        <li><div><label for="budget-food">Makanan</label><span>85%</span></div><p>Rp1.020.000 / Rp1.200.000</p><progress id="budget-food" value="1020000" max="1200000">85%</progress></li>
                        <li><div><label for="budget-transport">Transportasi</label><span>60%</span></div><p>Rp420.000 / Rp700.000</p><progress id="budget-transport" value="420000" max="700000">60%</progress></li>
                        <li><div><label for="budget-education">Pendidikan</label><span>39%</span></div><p>Rp315.000 / Rp800.000</p><progress id="budget-education" value="315000" max="800000">39%</progress></li>
                        <li><div><label for="budget-entertainment">Hiburan</label><span>51%</span></div><p>Rp255.000 / Rp500.000</p><progress id="budget-entertainment" value="255000" max="500000">51%</progress></li>
                    </ul>
                    <button class="text-button panel-action" type="button" data-demo-link>Kelola semua budget</button>
                </section>
                <section class="panel" id="transactions" tabindex="-1" aria-labelledby="transactions-title">
                    <header class="panel-heading"><div><h2 id="transactions-title">Transaksi terbaru</h2><p>Empat transaksi terakhir</p></div><button class="text-button" type="button" data-demo-link>Lihat semua</button></header>
                    <div class="table-scroll" tabindex="0" role="region" aria-label="Tabel transaksi, geser untuk melihat semua kolom">
                        <table>
                            <caption class="sr-only">Transaksi terbaru September 2026</caption>
                            <thead><tr><th scope="col">Transaksi</th><th scope="col">Kategori</th><th scope="col">Tanggal</th><th scope="col" class="amount">Jumlah</th><th scope="col"><span class="sr-only">Tindakan</span></th></tr></thead>
                            <tbody>
                                <tr><th scope="row">Makan siang<small>QRIS · Warung Nusantara</small></th><td>Makanan</td><td><time datetime="2026-09-30">30 Sep</time></td><td class="amount">−Rp32.000</td><td><button class="text-button" type="button" aria-label="Menu transaksi makan siang" data-demo-link>Opsi</button></td></tr>
                                <tr><th scope="row">Freelance design<small>Transfer · Bank Jago</small></th><td>Pemasukan</td><td><time datetime="2026-09-29">29 Sep</time></td><td class="amount">+Rp850.000</td><td><button class="text-button" type="button" aria-label="Menu transaksi freelance design" data-demo-link>Opsi</button></td></tr>
                                <tr><th scope="row">Ojek ke kampus<small>GoPay · GoRide</small></th><td>Transportasi</td><td><time datetime="2026-09-29">29 Sep</time></td><td class="amount">−Rp18.500</td><td><button class="text-button" type="button" aria-label="Menu transaksi ojek ke kampus" data-demo-link>Opsi</button></td></tr>
                                <tr><th scope="row">Print modul kuliah<small>Tunai · Fotokopi Sahabat</small></th><td>Pendidikan</td><td><time datetime="2026-09-28">28 Sep</time></td><td class="amount">−Rp45.000</td><td><button class="text-button" type="button" aria-label="Menu transaksi print modul kuliah" data-demo-link>Opsi</button></td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="panel report-panel" id="report" tabindex="-1" aria-labelledby="report-title">
                    <header class="panel-heading"><div><h2 id="report-title">Prediksi akhir bulan</h2><p>Pengeluaran diperkirakan di bawah budget</p></div></header>
                    <dl class="report-summary"><dt>Estimasi total pengeluaran</dt><dd class="stat-value">Rp2.970.000</dd><dt>Budget bulanan</dt><dd>Rp3.500.000</dd></dl>
                    <label class="sr-only" for="report-progress">Estimasi penggunaan budget</label>
                    <progress id="report-progress" value="2970000" max="3500000">85%</progress>
                    <p class="report-note">Perkiraan sisa anggaran: <strong>Rp530.000</strong>.</p>
                    <button class="text-button" type="button" data-demo-link>Lihat analisis lengkap</button>
                </section>
            </div>
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
            <div class="field"><label for="amount">Jumlah (Rp)</label><input id="amount" name="amount" type="number" min="1" step="1" inputmode="numeric" placeholder="0" required autofocus></div>
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
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH E:\1WORK\Projects\WebProg\resources\views/dashboard.blade.php ENDPATH**/ ?>