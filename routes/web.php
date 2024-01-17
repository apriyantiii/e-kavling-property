<?php

use App\Http\Controllers\Admin\ProductController;
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

// User
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ADMIN START
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//product
Route::get('product/index', [ProductController::class, 'index'])->name('product.index')->middleware('is_admin');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create')->middleware('is_admin');
Route::get('product/delete', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('is_admin');

//category-product
Route::post('category/create', [ProductController::class, 'storeCategory'])->name('category.store')->middleware('is_admin');
Route::get('category/{productCategory}/edit', [ProductController::class, 'editCategory'])->name('category.edit')->middleware('is_admin');
Route::put('category/{productCategory}', [ProductController::class, 'updateCategory'])->name('category.update')->middleware('is_admin');
Route::delete('category/{productCategory}', [ProductController::class, 'destroyCategory'])->name('category.destroy')->middleware('is_admin');
Route::delete('category/delete-all', [ProductController::class, 'destroyAllCategory'])->name('category.destroy-all')->middleware('is_admin');

// ADMIN END

// Director
Route::get('director/home', [App\Http\Controllers\HomeController::class, 'directorHome'])->name('director.home')->middleware('is_admin');




// Route::middleware('is_admin:admin')->group(function () {
//     //dashboard
//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    // //product
    // Route::get('product', [ProductController::class, 'index'])->name('product.index');
    // Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    // Route::get('product/delete', [ProductController::class, 'destroy'])->name('product.destroy');
// });

// Route::middleware('is_admin:director')->group(function () {
//     Route::get('/director/home', [HomeController::class, 'directorHome'])->name('director.home');
//     // ... tambahkan rute khusus director di sini
// });

// Route::middleware('is_admin:user')->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     // ... tambahkan rute khusus user di sini
// });

    // ... tambahkan rute khusus guest dan lainnya di sini
