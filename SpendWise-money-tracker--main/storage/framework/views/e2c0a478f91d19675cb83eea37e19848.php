<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kelola budget bulanan dan kategori SpendWise.">
    <title>Budget — SpendWise</title>
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
                <li><a class="active" href="<?php echo e(route('budget')); ?>" aria-current="page">Budget</a></li>
                <li><a href="<?php echo e(route('dashboard')); ?>#analytics">Analisis</a></li>
                <li><a href="<?php echo e(route('dashboard')); ?>#report">Laporan</a></li>
            </ul>
            <p class="section-label">Akun</p>
            <ul>
                <li><a href="<?php echo e(route('profile')); ?>">Profil saya</a></li>
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
                <a href="<?php echo e(route('profile')); ?>">Raka Aditya</a>
            </nav>
        </header>
        <main class="dashboard-content" id="main-content" tabindex="-1">
            <header class="page-heading">
                <div>
                    <p class="section-label">September 2026</p>
                    <h1>Budget</h1>
                    <p>Atur batas pengeluaran dan pantau progres setiap kategori.</p>
                </div>
                <a class="button primary-button" href="#category-form">Tambah kategori</a>
            </header>
            <section class="balance-summary budget-overview" aria-label="Ringkasan budget">
                <dl>
                    <div><dt>Budget bulanan</dt><dd class="stat-value" data-budget-total>Rp2.500.000</dd><dd class="stat-note">Batas pengeluaran September</dd></div>
                    <div><dt>Terpakai</dt><dd class="stat-value" data-budget-used>Rp1.295.000</dd><dd class="stat-note" data-budget-used-note>52% dari total budget</dd></div>
                    <div><dt>Tersisa</dt><dd class="stat-value" data-budget-remaining>Rp1.205.000</dd><dd class="stat-note">Masih tersedia bulan ini</dd></div>
                    <div><dt>Persentase</dt><dd class="stat-value" data-budget-percentage>52%</dd><dd class="stat-note">Penggunaan keseluruhan</dd></div>
                </dl>
            </section>
            <div class="budget-layout">
                <section class="panel budget-form-panel" aria-labelledby="monthly-budget-title">
                    <header class="panel-heading"><div><h2 id="monthly-budget-title">Monthly Budget</h2><p>Tentukan batas pengeluaran untuk satu bulan.</p></div></header>
                    <form class="budget-form" data-monthly-budget-form>
                        <div class="field"><label for="monthly-budget">Jumlah budget (Rp)</label><input id="monthly-budget" name="monthly_budget" type="number" min="1" step="1000" value="2500000" inputmode="numeric" required></div>
                        <div class="field"><label for="budget-month">Periode</label><input id="budget-month" name="month" type="month" value="2026-09" required></div>
                        <button class="button primary-button" type="submit">Simpan monthly budget</button>
                    </form>
                    <p class="form-note">Budget bulanan menjadi batas utama dari seluruh kategori.</p>
                </section>
                <section class="panel category-budget-panel" aria-labelledby="category-budget-title">
                    <header class="panel-heading"><div><h2 id="category-budget-title">Category Budget</h2><p>Bagikan budget ke kebutuhan yang paling penting.</p></div></header>
                    <form class="budget-form category-form" id="category-form" data-category-budget-form>
                        <div class="field"><label for="category-name">Nama kategori</label><input id="category-name" name="category" type="text" placeholder="Contoh: Food" required></div>
                        <div class="field"><label for="category-amount">Budget (Rp)</label><input id="category-amount" name="amount" type="number" min="1" step="1000" placeholder="800000" inputmode="numeric" required></div>
                        <button class="button primary-button" type="submit">Tambah category budget</button>
                    </form>
                </section>
            </div>
            <section class="panel budget-list-panel" aria-labelledby="category-list-title">
                <header class="panel-heading"><div><h2 id="category-list-title">Budget kategori</h2><p>Penggunaan dan sisa budget bulan September 2026.</p></div><span class="budget-count" data-budget-count>5 kategori</span></header>
                <div class="budget-table" data-budget-list>
                    <article class="budget-row" data-category="food" data-budget="800000" data-used="560000"><div class="budget-row-heading"><h3>Food</h3><strong data-category-percentage>70%</strong></div><div class="budget-row-values"><span>Budget <b data-category-budget>Rp800.000</b></span><span>Used <b data-category-used>Rp560.000</b></span><span>Remaining <b data-category-remaining>Rp240.000</b></span></div><progress value="560000" max="800000" aria-label="Food terpakai 70 persen">70%</progress></article>
                    <article class="budget-row" data-category="transport" data-budget="400000" data-used="260000"><div class="budget-row-heading"><h3>Transport</h3><strong data-category-percentage>65%</strong></div><div class="budget-row-values"><span>Budget <b data-category-budget>Rp400.000</b></span><span>Used <b data-category-used>Rp260.000</b></span><span>Remaining <b data-category-remaining>Rp140.000</b></span></div><progress value="260000" max="400000" aria-label="Transport terpakai 65 persen">65%</progress></article>
                    <article class="budget-row" data-category="education" data-budget="300000" data-used="110000"><div class="budget-row-heading"><h3>Education</h3><strong data-category-percentage>37%</strong></div><div class="budget-row-values"><span>Budget <b data-category-budget>Rp300.000</b></span><span>Used <b data-category-used>Rp110.000</b></span><span>Remaining <b data-category-remaining>Rp190.000</b></span></div><progress value="110000" max="300000" aria-label="Education terpakai 37 persen">37%</progress></article>
                    <article class="budget-row" data-category="entertainment" data-budget="300000" data-used="155000"><div class="budget-row-heading"><h3>Entertainment</h3><strong data-category-percentage>52%</strong></div><div class="budget-row-values"><span>Budget <b data-category-budget>Rp300.000</b></span><span>Used <b data-category-used>Rp155.000</b></span><span>Remaining <b data-category-remaining>Rp145.000</b></span></div><progress value="155000" max="300000" aria-label="Entertainment terpakai 52 persen">52%</progress></article>
                    <article class="budget-row" data-category="others" data-budget="700000" data-used="210000"><div class="budget-row-heading"><h3>Others</h3><strong data-category-percentage>30%</strong></div><div class="budget-row-values"><span>Budget <b data-category-budget>Rp700.000</b></span><span>Used <b data-category-used>Rp210.000</b></span><span>Remaining <b data-category-remaining>Rp490.000</b></span></div><progress value="210000" max="700000" aria-label="Others terpakai 30 persen">30%</progress></article>
                </div>
            </section>
        </main>
        <footer class="dashboard-footer"><p>© 2026 SpendWise</p><nav aria-label="Informasi"><button class="text-button" type="button" data-demo-link>Privasi</button><button class="text-button" type="button" data-demo-link>Bantuan</button></nav></footer>
    </div>
    <p class="toast" role="status" aria-live="polite" data-toast></p>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH C:\Users\alvin\Downloads\SpendWise-money-tracker--main\SpendWise-money-tracker--main\resources\views/budget.blade.php ENDPATH**/ ?>