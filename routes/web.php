<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConfigController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StripePaymentController;


//admin
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('pages/home');
// });
Route::get('/product', function () {
    return view('pages/product');
});

Route::middleware('locale')->group(function(){

    Route::get('/home', [HomeController::class, 'index']);
    Route::post('/home/store', [HomeController::class, 'store']);


    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/detail/{id}', [ProductController::class, 'show']);

    Route::get('cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('addToCart/{id}', [ProductController::class, 'addToCart'])->name('add-cart');
    Route::patch('updateCart', [ProductController::class, 'updateCart'])->name('update.cart');
    Route::delete('removeCart', [ProductController::class, 'removeCart'])->name('remove.from.cart');

    Route::get('stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
    // Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
    // Route::post('stripe/store', [StripePaymentController::class, 'store'])->name('store-stripe');
    Route::get('stripe/detail', [StripePaymentController::class, 'detail'])->name('stripe-detail');

    Route::get('/contact', [ProductController::class, 'contact'])->name('contact');

});


Route::get('/lang/{code}', [ConfigController::class, 'switchLang']); 

  

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('home-dashboard');

    Route::get('/product', [AdminProductController::class, 'index'])->name('list-product');
    Route::get('/product/create', [AdminProductController::class, 'create'])->name('create-product');
    Route::post('/product/store', [AdminProductController::class, 'store'])->name('store-product');
    Route::get('/product/view/{id}', [AdminProductController::class, 'view'])->name('view-product');
    Route::get('/product/edit/{id}', [AdminProductController::class, 'edit'])->name('edit-product');
    Route::put('/product/update/{id}', [AdminProductController::class, 'update'])->name('update-product');
    Route::delete('/product/delete/{id}', [AdminProductController::class, 'destory'])->name('delete-product');

    Route::get('/type', [AdminProductController::class, 'type'])->name('list-type');
    Route::get('/createType', [AdminProductController::class, 'createType'])->name('create-type');
    Route::post('/storeType', [AdminProductController::class, 'storeType'])->name('store-type');
    Route::get('/editType/{id}', [AdminProductController::class, 'editType'])->name('edit-type');
    Route::put('/updateType/{id}', [AdminProductController::class, 'updateType'])->name('update-type');
    Route::delete('/deleteType/{id}', [AdminProductController::class, 'deleteType'])->name('delete-type');

    // Route::get('/setting', [AdminUserController::class, 'setting'])->name('setting');
    Route::get('/user', [AdminUserController::class, 'index'])->name('list-user');
    Route::get('/create', [AdminUserController::class, 'create'])->name('create-user');
    Route::post('/store', [AdminUserController::class, 'store'])->name('store-user');
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit-user');
    Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('update-user');
    Route::delete('/delete/{id}', [AdminUserController::class, 'destroy'])->name('delete-user');
});



Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
