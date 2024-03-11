<?php

use App\Livewire\Cars\Searchresults;
use Illuminate\Support\Facades\Route;

use App\Livewire\Home;
use App\Livewire\Cars\Singlecar;
use App\Livewire\Cars\Singlecategory;
use Livewire\Volt\Volt;


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

// Route::view('/', 'welcome');{}

Route::get('/', Home::class)->name('home');

Volt::Route('/car/add', 'cars.addcar')->middleware(['auth'])->name('cars.add');


Route::get('/cars/{car}', Singlecar::class)->name('car.show');
Route::get('/cars/type/{type}', Singlecategory::class)->name('cars.category');
Route::get('/cars/search/{term}', Searchresults::class)->name('cars.searchresults');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
