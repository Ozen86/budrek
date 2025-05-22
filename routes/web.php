<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Siswa\Form;
use App\Livewire\Siswa\View;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('siswa', 'siswa')
    ->middleware(['auth', 'verified'])
    ->name('siswa');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('/siswa/show/{id}', View::class)->name('siswa.show');
    Route::get('/siswa/create', Form::class)->name('siswa.create');
    Route::get('/siswa/edit/{id}', Form::class)->name('siswa.edit');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
