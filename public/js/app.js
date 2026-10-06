// Interaksi sederhana, tanpa framework frontend.
document.addEventListener('DOMContentLoaded', function () {
    const toast = document.querySelector('[data-toast]');
    let toastTimer;

    function showToast(message) {
        toast.textContent = message;
        toast.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () {
            toast.classList.remove('show');
            toast.textContent = '';
        }, 3500);
    }

    const passwordToggle = document.querySelector('[data-password-toggle]');
    const passwordInput = document.querySelector('#password');
    if (passwordToggle) {
        passwordToggle.addEventListener('click', function () {
            const visible = passwordInput.type === 'password';
            passwordInput.type = visible ? 'text' : 'password';
            passwordToggle.textContent = visible ? 'Sembunyikan' : 'Lihat';
            passwordToggle.setAttribute('aria-pressed', String(visible));
            passwordToggle.setAttribute('aria-label', visible ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
        });
    }

    document.querySelectorAll('[data-demo-link]').forEach(function (button) {
        button.addEventListener('click', function () {
            showToast('Fitur ini belum tersedia di versi contoh.');
        });
    });

    const sidebar = document.querySelector('[data-sidebar]');
    const menuButton = document.querySelector('[data-sidebar-open]');
    const backdrop = document.querySelector('.sidebar-backdrop');
    const mobileScreen = window.matchMedia('(max-width: 760px)');

    function closeSidebar() {
        sidebar.classList.remove('open');
        sidebar.inert = mobileScreen.matches;
        backdrop.hidden = true;
        menuButton.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (sidebar) {
        sidebar.inert = mobileScreen.matches;
        menuButton.addEventListener('click', function () {
            sidebar.inert = false;
            sidebar.classList.add('open');
            backdrop.hidden = false;
            menuButton.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
            sidebar.querySelector('.menu-close').focus();
        });
        document.querySelectorAll('[data-sidebar-close]').forEach(function (button) {
            button.addEventListener('click', function () {
                closeSidebar();
                menuButton.focus();
            });
        });
        document.querySelectorAll('.main-nav a').forEach(function (link) {
            link.addEventListener('click', function () {
                document.querySelectorAll('.main-nav a').forEach(function (item) {
                    item.classList.remove('active');
                    item.removeAttribute('aria-current');
                });
                link.classList.add('active');
                link.setAttribute('aria-current', 'location');
                if (mobileScreen.matches) {
                    closeSidebar();
                    document.querySelector(link.getAttribute('href')).focus({ preventScroll: true });
                }
            });
        });
        mobileScreen.addEventListener('change', closeSidebar);
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && sidebar.classList.contains('open')) {
                closeSidebar();
                menuButton.focus();
            }
        });
    }

    const alertClose = document.querySelector('[data-alert-close]');
    if (alertClose) {
        alertClose.addEventListener('click', function () {
            alertClose.closest('.budget-alert').remove();
        });
    }

    const modal = document.querySelector('[data-modal]');
    if (modal) {
        document.querySelector('[data-modal-open]').addEventListener('click', function () {
            modal.showModal();
            document.body.style.overflow = 'hidden';
        });
        document.querySelectorAll('[data-modal-close]').forEach(function (button) {
            button.addEventListener('click', function () { modal.close(); });
        });
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                const bounds = modal.getBoundingClientRect();
                if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) {
                    modal.close();
                }
            }
        });
        modal.addEventListener('close', function () { document.body.style.overflow = ''; });
        document.querySelector('[data-transaction-form]').addEventListener('submit', function (event) {
            event.preventDefault();
            modal.close();
            showToast('Form contoh selesai. Transaksi belum disimpan.');
            event.currentTarget.reset();
        });
    }
});
