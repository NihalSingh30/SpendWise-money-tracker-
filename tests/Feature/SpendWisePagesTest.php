<?php

namespace Tests\Feature;

use Tests\TestCase;

class SpendWisePagesTest extends TestCase
{
    public function test_login_page_can_be_rendered(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Masuk ke akunmu')
            ->assertSee('SpendWise');
    }

    public function test_dashboard_page_can_be_rendered(): void
    {
        $this->get('/dashboard')
            ->assertOk()
            ->assertSee('Ringkasan keuanganmu')
            ->assertSee('Transaksi terbaru');
    }

    public function test_profile_page_can_be_rendered(): void
    {
        $this->get('/profile')
            ->assertOk()
            ->assertSee('Profil saya')
            ->assertSee('Informasi pribadi')
            ->assertSee('Ubah kata sandi')
            ->assertSee('Simpan perubahan');
    }
}
