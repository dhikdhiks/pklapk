<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\Front\Siswa\Index as SiswaIndex;
use App\Livewire\Front\Guru\Index as GuruIndex;
use App\Livewire\Front\Industri\Index as IndustriIndex;
use App\Livewire\Front\Pkl\Index as PklIndex;
use App\Livewire\Front\Home\Index as HomeIndex;

// Route::get('/siswa', function () {
//     return "Siswa";
// })->middleware(['auth', 'verified','role:Siswa','check_user_email'])
//  ->name('siswa');

Route::get('/', function () {
    return view('welcome');
})->name('homescreen');

Route::get('/guru', GuruIndex::class)->name('guru');
Route::get('/siswa', SiswaIndex::class)->name('siswa');
Route::get('/industri', IndustriIndex::class)->name('industri');
Route::get('/pkl', PklIndex::class)->name('pkl');
Route::get('/home', HomeIndex::class)->name('home');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth','verified', 'role:Siswa|super_admin|Guru|Admin', 'check_user_email'])
    ->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
