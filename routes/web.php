<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/', fn() => view('landing'))->name('landing');
Route::get('/boutique', [ProductController::class, 'home'])->name('home');
Route::get('/wholesale', [ProductController::class, 'wholesale'])->name('wholesale');
Route::get('/wholesale/product/{slug}', [ProductController::class, 'wholesaleShow'])->name('wholesale.product');
Route::get('/wholesale/cart', [CartController::class, 'wholesaleIndex'])->name('wholesale.cart');
Route::get('/wholesale/add/{id}', [CartController::class, 'wholesaleAdd'])->name('wholesale.cart.add');
Route::get('/wholesale/checkout', [CartController::class, 'wholesaleCheckout'])->name('wholesale.checkout');
Route::delete('/wholesale/remove', [CartController::class, 'wholesaleRemove'])->name('wholesale.cart.remove');
Route::patch('/wholesale/update', [CartController::class, 'wholesaleUpdate'])->name('wholesale.cart.update');
Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('category');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product');

Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');
// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');

// Wishlist Routes
use App\Http\Controllers\WishlistController;
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/add-to-wishlist/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::delete('/remove-from-wishlist', [WishlistController::class, 'remove'])->name('wishlist.remove');
// Order Routes
use App\Http\Controllers\OrderController;
Route::post('/order/place', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{order_number}', [OrderController::class, 'show'])->name('order.show');

// Tracking Routes
Route::get('/track-order', [OrderController::class, 'trackForm'])->name('track.order');
Route::post('/track-order', [OrderController::class, 'track'])->name('track.order.post');

use App\Http\Controllers\AddressController;

// Address Routes
Route::post('/account/addresses', [AddressController::class, 'store'])->name('address.store')->middleware('auth');
Route::delete('/account/addresses/{id}', [AddressController::class, 'destroy'])->name('address.destroy')->middleware('auth');
Route::post('/account/addresses/{id}/default', [AddressController::class, 'makeDefault'])->name('address.default')->middleware('auth');

// Auth Routes
Route::get('/account', [AuthController::class, 'showAuth'])->name('account');
Route::get('/account/dashboard', [AuthController::class, 'dashboard'])->name('account.dashboard')->middleware('auth');
Route::get('/account/orders', [AuthController::class, 'orders'])->name('account.orders')->middleware('auth');
Route::get('/account/addresses', [AuthController::class, 'addresses'])->name('account.addresses')->middleware('auth');
Route::get('/account/profile', [AuthController::class, 'profile'])->name('account.profile')->middleware('auth');
Route::post('/account/profile', [AuthController::class, 'updateProfile'])->name('account.profile.update')->middleware('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
