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

    document.querySelectorAll('[data-password-toggle]').forEach(function (passwordToggle) {
        const passwordInput = document.getElementById(passwordToggle.getAttribute('aria-controls'));
        const fieldName = passwordInput.id === 'password-confirmation' ? 'konfirmasi kata sandi' : 'kata sandi';
        passwordToggle.addEventListener('click', function () {
            const visible = passwordInput.type === 'password';
            passwordInput.type = visible ? 'text' : 'password';
            passwordToggle.textContent = visible ? 'Sembunyikan' : 'Lihat';
            passwordToggle.setAttribute('aria-pressed', String(visible));
            passwordToggle.setAttribute('aria-label', (visible ? 'Sembunyikan ' : 'Tampilkan ') + fieldName);
        });
    });

    document.querySelectorAll('[data-demo-link]').forEach(function (button) {
        button.addEventListener('click', function () {
            showToast('Fitur ini belum tersedia di versi contoh.');
        });
    });

    const profileForm = document.querySelector('[data-profile-form]');
    if (profileForm) {
        profileForm.addEventListener('submit', function (event) {
            event.preventDefault();
            showToast('Perubahan profil belum disimpan di versi contoh.');
        });
    }

    const passwordForm = document.querySelector('[data-password-form]');
    if (passwordForm) {
        passwordForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const password = passwordForm.querySelector('[name="new_password"]');
            const confirmation = passwordForm.querySelector('[name="new_password_confirmation"]');

            if (password.value !== confirmation.value) {
                confirmation.setCustomValidity('Konfirmasi kata sandi belum cocok.');
                confirmation.reportValidity();
                confirmation.addEventListener('input', function () {
                    confirmation.setCustomValidity('');
                }, { once: true });
                return;
            }

            showToast('Kata sandi belum diubah di versi contoh.');
            passwordForm.reset();
        });
    }

    const profilePhoto = document.querySelector('[data-profile-photo]');
    const profileAvatar = document.querySelector('[data-profile-avatar]');
    if (profilePhoto && profileAvatar) {
        let photoPreviewUrl;
        profilePhoto.addEventListener('change', function () {
            const file = profilePhoto.files[0];
            if (!file) {
                return;
            }
            if (!file.type.startsWith('image/')) {
                profilePhoto.value = '';
                showToast('Pilih file gambar untuk foto profil.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) {
                profilePhoto.value = '';
                showToast('Ukuran foto maksimal 5 MB.');
                return;
            }

            if (photoPreviewUrl) {
                URL.revokeObjectURL(photoPreviewUrl);
            }
            photoPreviewUrl = URL.createObjectURL(file);
            profileAvatar.replaceChildren();
            const image = document.createElement('img');
            image.src = photoPreviewUrl;
            image.alt = 'Pratinjau foto profil';
            profileAvatar.append(image);
        });
    }

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

    const budgetList = document.querySelector('[data-budget-list]');
    if (budgetList) {
        const monthlyBudgetForm = document.querySelector('[data-monthly-budget-form]');
        const categoryBudgetForm = document.querySelector('[data-category-budget-form]');
        let monthlyBudget = Number(document.querySelector('[data-budget-total]').textContent.replace(/[^0-9]/g, ''));

        function formatRupiah(value) {
            return 'Rp' + Math.max(0, value).toLocaleString('id-ID');
        }

        function updateCategory(row) {
            const budget = Number(row.dataset.budget);
            const used = Number(row.dataset.used);
            const percentage = budget > 0 ? Math.min(100, Math.round((used / budget) * 100)) : 0;
            row.querySelector('[data-category-percentage]').textContent = percentage + '%';
            row.querySelector('[data-category-budget]').textContent = formatRupiah(budget);
            row.querySelector('[data-category-used]').textContent = formatRupiah(used);
            row.querySelector('[data-category-remaining]').textContent = formatRupiah(budget - used);
            const progress = row.querySelector('progress');
            progress.value = Math.min(used, budget);
            progress.max = budget;
            progress.textContent = percentage + '%';
            progress.setAttribute('aria-label', row.querySelector('h3').textContent + ' terpakai ' + percentage + ' persen');
        }

        function updateOverview() {
            const used = Array.from(budgetList.querySelectorAll('.budget-row')).reduce(function (total, row) {
                return total + Number(row.dataset.used);
            }, 0);
            const percentage = monthlyBudget > 0 ? Math.min(100, Math.round((used / monthlyBudget) * 100)) : 0;
            document.querySelector('[data-budget-total]').textContent = formatRupiah(monthlyBudget);
            document.querySelector('[data-budget-used]').textContent = formatRupiah(used);
            document.querySelector('[data-budget-remaining]').textContent = formatRupiah(monthlyBudget - used);
            document.querySelector('[data-budget-percentage]').textContent = percentage + '%';
            document.querySelector('[data-budget-used-note]').textContent = percentage + '% dari total budget';
            document.querySelector('[data-budget-count]').textContent = budgetList.querySelectorAll('.budget-row').length + ' kategori';
        }

        budgetList.querySelectorAll('.budget-row').forEach(updateCategory);
        updateOverview();

        monthlyBudgetForm.addEventListener('submit', function (event) {
            event.preventDefault();
            monthlyBudget = Number(monthlyBudgetForm.elements.monthly_budget.value);
            updateOverview();
            showToast('Monthly budget berhasil diperbarui.');
        });

        categoryBudgetForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const name = categoryBudgetForm.elements.category.value.trim();
            const amount = Number(categoryBudgetForm.elements.amount.value);
            const row = budgetList.querySelector('.budget-row').cloneNode(true);
            row.dataset.category = name.toLowerCase().replace(/[^a-z0-9]+/g, '-');
            row.dataset.budget = amount;
            row.dataset.used = 0;
            row.querySelector('h3').textContent = name;
            updateCategory(row);
            budgetList.append(row);
            updateOverview();
            categoryBudgetForm.reset();
            showToast('Category budget ' + name + ' berhasil ditambahkan.');
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
