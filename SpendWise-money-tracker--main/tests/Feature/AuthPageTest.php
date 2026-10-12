<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthPageTest extends TestCase
{
    public function test_login_and_registration_use_the_same_page(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertViewIs('auth')
            ->assertViewHas('register', false)
            ->assertSee('Masuk ke akunmu');

        $this->get('/?mode=register')
            ->assertOk()
            ->assertViewIs('auth')
            ->assertViewHas('register', true)
            ->assertSee('Nama lengkap')
            ->assertSee('Konfirmasi kata sandi');
    }

    public function test_unknown_mode_falls_back_to_login(): void
    {
        $this->get('/?mode=unknown')
            ->assertOk()
            ->assertViewHas('register', false);
    }

    public function test_valid_demo_login_opens_the_dashboard(): void
    {
        $this->post('/login', [
            'email' => 'mahasiswa@kampus.ac.id',
            'password' => 'spendwise',
        ])->assertRedirect(route('dashboard'));

        $this->assertGuest();
    }

    public function test_invalid_login_keeps_the_email_without_flashing_the_password(): void
    {
        $this->post('/login', [
            'email' => 'not-an-email',
            'password' => 'private-password',
        ])->assertRedirect(route('login'))
            ->assertSessionHasErrors('email')
            ->assertSessionHas('_old_input.email', 'not-an-email')
            ->assertSessionMissing('_old_input.password');
    }

    public function test_valid_registration_returns_to_login_with_a_demo_notice(): void
    {
        $this->post('/register', [
            'name' => 'Raka Aditya',
            'email' => 'raka@kampus.ac.id',
            'password' => 'private-password',
            'password_confirmation' => 'private-password',
        ])->assertRedirect(route('login'))
            ->assertSessionHas('status')
            ->assertSessionHas('_old_input.email', 'raka@kampus.ac.id')
            ->assertSessionMissing('_old_input.password')
            ->assertSessionMissing('_old_input.password_confirmation');

        $this->get('/')
            ->assertSee('akun belum dibuat')
            ->assertSee('raka@kampus.ac.id');

        $this->assertGuest();
    }

    public function test_registration_rejects_mismatched_passwords_and_preserves_the_form(): void
    {
        $this->post('/register', [
            'name' => 'Raka Aditya',
            'email' => 'raka@kampus.ac.id',
            'password' => 'private-password',
            'password_confirmation' => 'different-password',
        ])->assertRedirect(route('login', ['mode' => 'register']))
            ->assertSessionHasErrors('password')
            ->assertSessionHas('_old_input.name', 'Raka Aditya')
            ->assertSessionMissing('_old_input.password')
            ->assertSessionMissing('_old_input.password_confirmation');

        $this->get('/?mode=register')
            ->assertSee('Konfirmasi kata sandi harus sama.')
            ->assertSee('Raka Aditya')
            ->assertDontSee('value="private-password"', false);
    }

    public function test_registration_requires_all_fields(): void
    {
        $this->post('/register', [])
            ->assertRedirect(route('login', ['mode' => 'register']))
            ->assertSessionHasErrors(['name', 'email', 'password', 'password_confirmation']);
    }

    public function test_registration_rejects_a_short_password(): void
    {
        $this->post('/register', [
            'name' => 'Raka',
            'email' => 'raka@kampus.ac.id',
            'password' => 'short',
            'password_confirmation' => 'short',
        ])->assertSessionHasErrors('password');
    }
}
