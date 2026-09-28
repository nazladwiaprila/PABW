<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cobacontroller;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view ('welcome');
   })->name ('home.page');

Route::get('/coba', [cobacontroller::class, 'index']);
Route::get('/final', [cobacontroller::class, 'final']);
Route::get('/Hello', function(){
    return ('hello, najlak');
});

Route::get('/user/{name}', function ($name){
    return"Nama saya $name";
});

Route::get('/greet/{name?}', function ($name='Guest'){
    return"Halo,$name";
});

Route::get('/about', function(){
    return view('about',['name'=> 'Nama najlak']);
});

Route::get('/profile', function(){
    return view('about',['name'=> 'name anda']);
});

Route::get('/form', [DataController::class, 'form']);
Route::post('/proses', [DataController::class, 'proses']);

Route::get('/formmahasiswa', [MahasiswaController::class, 'formmahasiswa']);
Route::post('/prosesmahasiswa', [MahasiswaController::class, 'prosesmahasiswa']);



Route::get('/lapor-banjir', [\App\Http\Controllers\LaporBanjirController::class, 'create'])->name('lapor-banjir.create');
Route::post('/lapor-banjir', [\App\Http\Controllers\LaporBanjirController::class, 'store'])->name('lapor-banjir.store');

// EcoTaste: prototipe tanpa database dengan alur daftar, login, dan dashboard.
use App\Http\Controllers\EcoTasteController;

Route::prefix('ecotaste')->name('ecotaste.')->group(function () {
    Route::get('/login', [EcoTasteController::class, 'showLogin'])->name('login');
    Route::post('/login', [EcoTasteController::class, 'login'])->name('login.submit');
    Route::get('/signup', [EcoTasteController::class, 'showSignup'])->name('signup');
    Route::post('/signup', [EcoTasteController::class, 'signup'])->name('signup.submit');
    Route::post('/logout', [EcoTasteController::class, 'logout'])->name('logout');
    Route::get('/', [EcoTasteController::class, 'home'])->name('home');
    Route::get('/laporan-limbah', [EcoTasteController::class, 'reports'])->name('laporan');
    Route::post('/laporan-limbah', [EcoTasteController::class, 'saveReport'])->name('laporan.store');
    Route::get('/rating', [EcoTasteController::class, 'ratings'])->name('rating');
    Route::post('/rating', [EcoTasteController::class, 'saveRating'])->name('rating.store');
});
