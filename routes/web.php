<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Siswa\Form;
use App\Livewire\Siswa\View;
use App\Livewire\Guru\Form as GuruForm;
use App\Livewire\Guru\View as GuruView;
use App\Livewire\Industri\Form as IndustriForm;
use App\Livewire\Industri\View as IndustriView;
use App\Livewire\PKL\Form as PKLForm;
use App\Livewire\PKL\View as PKLView;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('siswa', 'siswa')
    ->middleware(['auth', 'verified'])
    ->name('siswa');

Route::view('guru', 'guru')
    ->middleware(['auth', 'verified'])
    ->name('guru');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // CRUD SISWA GURU INDUSTRI PKL
    Route::get('/siswa/show/{id}', View::class)->name('siswa.show');
    Route::get('/siswa/create', Form::class)->name('siswa.create');
    Route::get('/siswa/edit/{id}', Form::class)->name('siswa.edit');

    Route::get('/guru/show/{id}', GuruView::class)->name('guru.show');
    Route::get('/guru/create', GuruForm::class)->name('guru.create');
    Route::get('/guru/edit/{id}', GuruForm::class)->name('guru.edit');

    
    // CRUD SISWA GURU INDUSTRI PKL
    
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
