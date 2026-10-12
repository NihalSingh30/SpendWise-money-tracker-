<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Masuk atau daftar untuk mencatat keuangan pribadi di SpendWise.">
    <title><?php echo e($register ? 'Daftar' : 'Masuk'); ?> — SpendWise</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body class="login-page">
    <header class="login-header">
        <a class="brand" href="<?php echo e(route('login')); ?>">SpendWise</a>
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
                <a href="<?php echo e(route('login')); ?>" <?php if(!$register): ?> aria-current="page" <?php endif; ?>>Masuk</a>
                <a href="<?php echo e(route('login', ['mode' => 'register'])); ?>" <?php if($register): ?> aria-current="page" <?php endif; ?>>Daftar</a>
            </nav>
            <header>
                <h2 id="auth-title"><?php echo e($register ? 'Buat akun' : 'Masuk ke akunmu'); ?></h2>
                <p><?php echo e($register ? 'Isi nama, alamat email, dan kata sandi.' : 'Gunakan alamat email dan kata sandi.'); ?></p>
            </header>

            <?php if(session('status')): ?>
                <p class="auth-message" role="status"><?php echo e(session('status')); ?></p>
            <?php endif; ?>
            <?php if($errors->any()): ?>
                <p class="auth-message" role="alert">Periksa kembali isian yang ditandai di bawah.</p>
            <?php endif; ?>

            <form class="auth-form" action="<?php echo e(route($register ? 'register.submit' : 'login.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php if($register): ?>
                    <div class="field">
                        <label for="name">Nama lengkap</label>
                        <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>" placeholder="Nama lengkap" autocomplete="name" maxlength="100" required <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> aria-invalid="true" aria-describedby="name-error" <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error" id="name-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                <?php endif; ?>
                <div class="field">
                    <label for="email">Alamat email</label>
                    <input id="email" name="email" type="email" value="<?php echo e(old('email', $register ? '' : 'mahasiswa@kampus.ac.id')); ?>" placeholder="nama@kampus.ac.id" autocomplete="email" maxlength="255" required <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> aria-invalid="true" aria-describedby="email-error" <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error" id="email-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="field">
                    <div class="field-label">
                        <label for="password">Kata sandi</label>
                        <?php if(!$register): ?>
                            <button class="text-button" type="button" data-demo-link>Lupa kata sandi?</button>
                        <?php endif; ?>
                    </div>
                    <div class="password-field">
                        <input id="password" name="password" type="password" value="<?php echo e(!$register && !$errors->any() ? 'spendwise' : ''); ?>" autocomplete="<?php echo e($register ? 'new-password' : 'current-password'); ?>" maxlength="255" <?php if($register): ?> minlength="8" aria-describedby="password-help<?php echo e($errors->has('password') ? ' password-error' : ''); ?>" <?php elseif($errors->has('password')): ?> aria-describedby="password-error" <?php endif; ?> required <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> aria-invalid="true" <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>>
                        <button type="button" aria-label="Tampilkan kata sandi" aria-controls="password" aria-pressed="false" data-password-toggle>Lihat</button>
                    </div>
                    <?php if($register): ?> <p class="form-note" id="password-help">Minimal 8 karakter.</p> <?php endif; ?>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error" id="password-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <?php if($register): ?>
                    <div class="field">
                        <label for="password-confirmation">Konfirmasi kata sandi</label>
                        <div class="password-field">
                            <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" minlength="8" maxlength="255" required <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> aria-invalid="true" aria-describedby="confirmation-error" <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>>
                            <button type="button" aria-label="Tampilkan konfirmasi kata sandi" aria-controls="password-confirmation" aria-pressed="false" data-password-toggle>Lihat</button>
                        </div>
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error" id="confirmation-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                <?php else: ?>
                    <label class="check-field"><input type="checkbox" name="remember" value="1" <?php if(old('remember', true)): echo 'checked'; endif; ?>> Ingat saya di perangkat ini</label>
                <?php endif; ?>
                <button class="button primary-button" type="submit"><?php echo e($register ? 'Daftar' : 'Masuk'); ?></button>
            </form>
            <p class="register-note">
                <?php if($register): ?>
                    Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk</a>
                <?php else: ?>
                    Belum punya akun? <a href="<?php echo e(route('login', ['mode' => 'register'])); ?>">Daftar</a>
                <?php endif; ?>
            </p>
            <p class="form-note">Versi contoh: masuk membuka dashboard, pendaftaran belum membuat akun.</p>
        </section>
    </main>
    <footer class="login-footer"><p>© 2026 SpendWise</p></footer>
    <p class="toast" role="status" aria-live="polite" data-toast></p>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</body>
</html>
<?php /**PATH C:\Users\alvin\Downloads\SpendWise-money-tracker--main\SpendWise-money-tracker--main\resources\views/auth.blade.php ENDPATH**/ ?>