<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\User;
use App\Http\Controllers\User\Checkout;
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

Route::get('/co', function () {
    return view('admin.live-chat.show');
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
    Route::get('categories', [User\ProductController::class, 'indexCategories'])->name('categories.index');

    //profile route
    Route::get('profile', [User\ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{user}', [User\ProfileController::class, 'update'])->name('profile.update');

    //wishlist
    Route::get('wishlist/', [User\WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('wishlist/create', [User\WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{wishlist}/delete', [User\WishlistController::class, 'destroy'])->name('wishlist.destroy');

    //checkout
    Route::get('checkout/{product}', [User\Checkout\PurchaseValidationController::class, 'index'])->name('checkout.purchase');
    Route::post('checkout/store', [User\Checkout\PurchaseValidationController::class, 'store'])->name('purchase.validation.store');
    Route::put('checkout/update-purchase-validation', [User\Checkout\PurchaseValidationController::class, 'update'])->name('purchase.updatePurchaseValidation');

    // checkout-validasi berkas
    Route::get('edit-validation', [User\Checkout\PurchaseValidationController::class, 'edit'])->name('edit-validate');
    Route::get('validation/{id}', [User\Checkout\PurchaseValidationController::class, 'waitingValidate'])->name('waiting-validate');
    Route::get('validation-rejected', [User\Checkout\PurchaseValidationController::class, 'rejectedValidate'])->name('rejected-validate');

    // checkout-konfirmasi pembelian
    Route::get('confirmation/{productId}', [User\Checkout\ConfirmationController::class, 'index'])->name('checkout.confirmation');

    // Checkout-pembayaran
    Route::get('payments/{productId}', [User\Checkout\PaymentsController::class, 'create'])->name('checkout.payments');
    Route::post('payments/store', [User\Checkout\PaymentsController::class, 'store'])->name('checkout.payments.store');
    Route::get('payments-success', [User\Checkout\PaymentsController::class, 'paymentSuccess'])->name('checkout.payments-success');

    //checkout-pembayaran inhouse
    Route::get('payments/inhouse/{productId}', [User\Checkout\InhousePaymentController::class, 'create'])->name('checkout.inhouse-payments');
    Route::post('payments/inhouse/store', [User\Checkout\InhousePaymentController::class, 'store'])->name('checkout.inhouse-payments.store');

    // Checkout-rincian pembelian
    Route::get('invoice', [User\Checkout\InvoiceController::class, 'index'])->name('checkout.invoice');
    Route::get('invoice-validate/detail/{purchaseValidationShow}', [User\Checkout\InvoiceController::class, 'showValidate'])->name('checkout.invoice.validate');
    Route::get('invoice-payments/detail/{payments}', [User\Checkout\InvoiceController::class, 'showPayment'])->name('checkout.invoice.payment');
    Route::get('invoice/inhouse-payments/detail/{userId}', [User\Checkout\InvoiceController::class, 'showInhouse'])->name('checkout.invoice.inhouse-payment');

    // live chat
    Route::get('live-chat', [User\LiveChatController::class, 'index'])->name('user.live-chat');
    Route::post('live-chat/store', [User\LiveChatController::class, 'store'])->name('user.live-chat.store');
    Route::get('live-chat/product/{product}', [User\LiveChatController::class, 'indexChat'])->name('user.live-chat.product');
    Route::post('live-chat/product/store/{product}', [User\LiveChatController::class, 'storeChat'])->name('user.live-chat.product.storeChat');
    Route::delete('live-chat/{chat}', [User\LiveChatController::class, 'destroy'])->name('user.live-chat.destroy');
});
//USER END

// ADMIN START
Route::prefix('admin')->group(function () {
    // Auth Admin
    Route::get('/', [Admin\LoginController::class, 'loginForm']);
    Route::get('/login', [Admin\LoginController::class, 'loginForm'])->name('admin.login-admin');
    Route::post('/login', [Admin\LoginController::class, 'login'])->name('admin.login');
    Route::get('/home', [Admin\HomeController::class, 'index'])->name('admin.home')->middleware('is_admin');
    Route::get('logout', [Admin\LoginController::class, 'logoutAdmin'])->name('admin.logout')->middleware('is_admin');

    // Product admin
    Route::get('product/index', [Admin\ProductController::class, 'index'])->name('product.index')->middleware('is_admin');
    Route::get('product/create', [Admin\ProductController::class, 'create'])->name('product.create')->middleware('is_admin');
    Route::post('product/create', [Admin\ProductController::class, 'store'])->name('product.store')->middleware('is_admin');
    Route::get('product/{product}/edit', [Admin\ProductController::class, 'edit'])->name('product.edit')->middleware('is_admin');
    Route::put('product/{product}', [Admin\ProductController::class, 'update'])->name('product.update')->middleware('is_admin');
    Route::delete('product/{product}/delete', [Admin\ProductController::class, 'destroy'])->name('product.destroy')->middleware('is_admin');
    Route::get('product/detail/{id}', [Admin\ProductController::class, 'showProduct'])->name('detail.product.admin')->middleware('is_admin');

    //category admin
    Route::get('category/index', [Admin\ProductController::class, 'indexCategory'])->name('category.index')->middleware('is_admin');
    Route::post('category/create', [Admin\ProductController::class, 'storeCategory'])->name('category.store')->middleware('is_admin');
    Route::get('category/{productCategory}/edit', [Admin\ProductController::class, 'editCategory'])->name('category.edit')->middleware('is_admin');
    Route::put('category/{productCategory}', [Admin\ProductController::class, 'updateCategory'])->name('category.update')->middleware('is_admin');
    Route::delete('category/{productCategory}/delete', [Admin\ProductController::class, 'destroyCategory'])->name('category.destroy')->middleware('is_admin');
    Route::delete('category/delete-all', [Admin\ProductController::class, 'destroyAllCategory'])->name('category.destroy-all');

    // Wishlist
    Route::get('wishlist', [Admin\WishlistController::class, 'index'])->name('admin.wishlist.index');

    //Transasksi
    Route::get('transaction', [Admin\Checkout\TransactionController::class, 'index'])->name('admin.transaction');

    //Validasi berkas
    Route::get('data-validate', [Admin\Checkout\DataValidateController::class, 'index'])->name('checkout.data-validate');
    Route::patch('data-validate/{purchaseValidate}', [Admin\Checkout\DataValidateController::class, 'updateStatus'])->name('data-validate.update');
    Route::get('data-validate-detail/{showValidate}', [Admin\Checkout\DataValidateController::class, 'show'])->name('checkout.validate.show');
    Route::delete('data-validate/delete/{id}', [Admin\Checkout\DataValidateController::class, 'destroy'])->name('checkout.validate.delete');
    Route::get('data-validate/edit/{validateId}', [Admin\Checkout\DataValidateController::class, 'edit'])->name('checkout.validate.edit');
    Route::put('data-validate/{purchaseValidation}/update', [Admin\Checkout\DataValidateController::class, 'update'])->name('checkout.validate.update');

    // payments
    Route::get('payments-validate', [Admin\Checkout\PaymentsValidateController::class, 'index'])->name('checkout.payments-validate');
    Route::get('payments-detail/{showPayment}', [Admin\Checkout\PaymentsValidateController::class, 'show'])->name('checkout.payment.show');
    Route::patch('/payments/{payment}', [Admin\Checkout\PaymentsValidateController::class, 'updateStatus'])->name('update-status');
    Route::delete('payments/delete{id}', [Admin\Checkout\PaymentsValidateController::class, 'destroy'])->name('checkout.payment.delete');
    Route::get('payments/edit/{paymentId}', [Admin\Checkout\PaymentsValidateController::class, 'edit'])->name('checkout.payment.edit');
    Route::put('payments/{payment}/update', [Admin\Checkout\PaymentsValidateController::class, 'update'])->name('checkout.payment.update');

    // inhouse-payments
    Route::get('inhouse-payments', [Admin\Checkout\InhousePaymentController::class, 'index'])->name('admin.checkout.inhouse-payments');
    Route::get('inhouse-payments/show/{userId}', [Admin\Checkout\InhousePaymentController::class, 'show'])->name('admin.checkout.inhouse-payment.show');
    Route::delete('inhouse-payments/delete/{id}', [Admin\Checkout\InhousePaymentController::class, 'destroy'])->name('admin.checkout.inhouse-payment.destroy');
    Route::patch('inhouse-payments/{id}/update-status', [Admin\Checkout\InhousePaymentController::class, 'updateStatus'])->name('admin.checkout.inhouse-payment.update-status');
    Route::get('inhouse-payments/detail/{id}', [Admin\Checkout\InhousePaymentController::class, 'showInhouse'])->name('admin.checkout.inhouse-payments.detail');
    Route::get('inhouse-payments/edit/{inhousePaymentId}', [Admin\Checkout\InhousePaymentController::class, 'edit'])->name('checkout.inhouse-payment.edit');
    Route::put('inhouse-payments/{inhousePayment}/update', [Admin\Checkout\InhousePaymentController::class, 'update'])->name('checkout.inhouse-payment.update');

    //live chat
    Route::get('chat/index', [Admin\ChatController::class, 'index'])->name('admin.chat.index');
    Route::get('chat/show/{userID}', [Admin\ChatController::class, 'show'])->name('admin.chat.show');
    Route::post('chat/store/{userID}', [Admin\ChatController::class, 'store'])->name('admin.chat.store');
    Route::delete('chat/{chat}', [Admin\ChatController::class, 'destroy'])->name('admin.chat.destroy');

    //pengaturan-> admin
    Route::get('settings/admin', [Admin\Setting\AdminController::class, 'index'])->name('admin.setting-admin.index');
    Route::post('settings/admin/store', [Admin\Setting\AdminController::class, 'store'])->name('admin.setting-admin.store');
    Route::get('settings/{admin}/edit', [Admin\Setting\AdminController::class, 'edit'])->name('admin.setting-admin.edit');
    Route::put('settings/{admin}/update', [Admin\Setting\AdminController::class, 'update'])->name('admin.setting-admin.update');
    Route::delete('settings/delete-admin/{id}', [Admin\Setting\AdminController::class, 'destroy'])->name('admin.setting-user.destroy');

    //pengaturan-> user
    Route::get('settings/user', [Admin\Setting\UserController::class, 'index'])->name('admin.setting-user.index');
    Route::get('settings/user/create', [Admin\Setting\UserController::class, 'create'])->name('admin.setting-user.create');
    Route::post('settungs/user/store', [Admin\Setting\UserController::class, 'store'])->name('admin.setting-user.store');
    Route::get('settings/user/{user}/edit', [Admin\Setting\UserController::class, 'edit'])->name('admin.setting-user.edit');
    Route::put('settings/user/{user}/update', [Admin\Setting\UserController::class, 'update'])->name('admin.setting-user.update');
    Route::delete('settings/delete-user/{id}', [Admin\Setting\UserController::class, 'destroy'])->name('admin.setting-admin.destroy');

    // Bank
    Route::get('bank', [Admin\BankController::class, 'index'])->name('admin.bank');
    Route::post('bank/store', [Admin\BankController::class, 'store'])->name('admin.bank.store');
    Route::put('bank/{bank}/update', [Admin\BankController::class, 'update'])->name('admin.bank.update');
    Route::delete('bank/delete/{id}', [Admin\BankController::class, 'destroy'])->name('admin.bank.destroy');
});
// Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// ADMIN END

// Director
Route::get('director/home', [App\Http\Controllers\HomeController::class, 'directorHome'])->name('director.home')->middleware('is_admin');


// Admin routes
// Route::prefix('admin')->middleware('is_admin')->group(function () {
//     Route::get('product/detail/{id}', [Admin\ProductController::class, 'showProduct'])
//         ->name('product.detail.admin');
// });

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
