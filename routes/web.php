<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('products', [HomeController::class, 'products'])->name('productsHome');
Route::get('product/{id}', [HomeController::class, 'productDetails'])->name('productDetails');
Route::get('services', [HomeController::class, 'services'])->name('servicesHome');
Route::get('service/{id}', [HomeController::class, 'serviceDetails'])->name('serviceDetails');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutUsHome');
Route::get('gallery', [HomeController::class, 'gallery'])->name('galleryHome');
Route::get('contact-us', [HomeController::class, 'contact'])->name('contact');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/clear', [HomeController::class, 'clear'])->name('clear');