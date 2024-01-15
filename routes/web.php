<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('guest.landing-page');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('director/home', [App\Http\Controllers\HomeController::class, 'directorHome'])->name('director.home')->middleware('is_admin');



// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::middleware('is_admin:admin')->group(function () {
//         Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
//         // ... tambahkan rute khusus admin di sini
//     });

//     Route::middleware('is_admin:director')->group(function () {
//         Route::get('/director/home', [HomeController::class, 'directorHome'])->name('director.home');
//         // ... tambahkan rute khusus director di sini
//     });

//     Route::middleware('is_admin:user')->group(function () {
//         Route::get('/home', [HomeController::class, 'index'])->name('home');
//         // ... tambahkan rute khusus user di sini
//     });

//     // ... tambahkan rute khusus guest dan lainnya di sini
// });
