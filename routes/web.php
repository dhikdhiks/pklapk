<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\Front\Siswa\Index as SiswaIndex;
use App\Livewire\Front\Guru\Index as GuruIndex;

// Route::get('/siswa', function () {
//     return "Siswa";
// })->middleware(['auth', 'verified','role:Siswa','check_user_email'])
//  ->name('siswa');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/guru', GuruIndex::class)->name('guru');
Route::get('/siswa', SiswaIndex::class)->name('siswa');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'role:Siswa|Admin', 'check_user_email'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
