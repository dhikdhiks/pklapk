<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;

// Route::get('/siswa', function () {
//     return "Siswa";
// })->middleware(['auth', 'verified','role:Siswa','check_user_email'])
//  ->name('siswa');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');

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
