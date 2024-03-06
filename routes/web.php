<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Cars\Singlecar;
use App\Livewire\Cars\Singlecategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::view('/', 'welcome');

Route::get('/', Home::class)->name('home');
Route::get('/car/{car}', Singlecar::class)->name('car.show');
Route::get('/cars/{type}', Singlecategory::class)->name('cars.category');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
