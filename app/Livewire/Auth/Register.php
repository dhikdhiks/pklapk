<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Validation\ValidationException;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // Cek apakah email terdaftar di siswa atau guru
        $isSiswa = Siswa::where('email', $this->email)->exists();
        $isGuru = Guru::where('email', $this->email)->exists();

        if (!$isSiswa && !$isGuru) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar sebagai siswa atau guru.',
            ]);
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        // Tambahkan role berdasarkan tabel yang cocok
        if ($isGuru) {
            $user->assignRole('Guru');
        } elseif ($isSiswa) {
            $user->assignRole('Siswa');
        }

        // Kirim email verifikasi
        event(new Registered($user));

        // Login user tapi arahkan dulu ke verifikasi
        Auth::login($user);

        // Redirect ke halaman verifikasi email
        $this->redirect(route('verification.notice'), navigate: true);
    }
}
