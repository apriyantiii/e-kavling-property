<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
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
    return view('landing-page');
});

//USER AUTH
Auth::routes();

// USER START
Route::prefix('/')->group(function () {
    //home isinya kumpulan beberapa product
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.properti')->middleware('auth');

    // product route
    Route::get('product/detail/{id}', [User\ProductController::class, 'show'])->name('product.show')->middleware('auth');
    Route::get('/search', [User\ProductController::class, 'search'])->name('product.search');

    //product-categories
    Route::get('categories', [User\ProductController::class, 'indexCategories'])->name('categories.index')->middleware('auth');

    //profile route
    Route::get('profile', [User\ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{user}', [User\ProfileController::class, 'update'])->name('profile.update');
});
//USER END


// ADMIN START
Route::prefix('admin')->group(function () {
    Route::get('/', [Admin\LoginController::class, 'loginForm']);
    Route::get('/login', [Admin\LoginController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('/home', [Admin\HomeController::class, 'index'])->name('admin.home')->middleware('is_admin');
    Route::get('logout', [Admin\LoginController::class, 'logoutAdmin'])->name('admin.logout')->middleware('is_admin');
});
// Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//product
Route::get('product/index', [Admin\ProductController::class, 'index'])->name('product.index')->middleware('is_admin');
Route::get('product/create', [Admin\ProductController::class, 'create'])->name('product.create')->middleware('is_admin');
Route::post('product/create', [Admin\ProductController::class, 'store'])->name('product.store')->middleware('is_admin');
Route::get('product/{product}/edit', [Admin\ProductController::class, 'edit'])->name('product.edit')->middleware('is_admin');
Route::put('product/{product}', [Admin\ProductController::class, 'update'])->name('product.update')->middleware('is_admin');
Route::delete('product/{product}/delete', [Admin\ProductController::class, 'destroy'])->name('product.destroy')->middleware('is_admin');


//category-product
Route::get('category/index', [Admin\ProductController::class, 'indexCategory'])->name('category.index')->middleware('is_admin');
Route::post('category/create', [Admin\ProductController::class, 'storeCategory'])->name('category.store')->middleware('is_admin');
Route::get('category/{productCategory}/edit', [Admin\ProductController::class, 'editCategory'])->name('category.edit')->middleware('is_admin');
Route::put('category/{productCategory}', [Admin\ProductController::class, 'updateCategory'])->name('category.update')->middleware('is_admin');
Route::delete('category/{productCategory}/delete', [Admin\ProductController::class, 'destroyCategory'])->name('category.destroy')->middleware('is_admin');
Route::delete('category/delete-all', [Admin\ProductController::class, 'destroyAllCategory'])->name('category.destroy-all')->middleware('is_admin');

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
