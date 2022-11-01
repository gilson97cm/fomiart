<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
Route::get('gallery', [DashboardController::class, 'gallery'])->name('gallery');
Route::get('products', [DashboardController::class, 'products'])->name('products');
Route::get('products-category', [DashboardController::class, 'productCategories'])->name('productsCategory');
Route::get('services', [DashboardController::class, 'services'])->name('services');
Route::get('banners', [DashboardController::class, 'banners'])->name('banners');
Route::get('about-us', [DashboardController::class, 'aboutUs'])->name('about-us');
Route::get('mission-vision', [DashboardController::class, 'missionVision'])->name('mission-vision');
Route::get('information', [DashboardController::class, 'information'])->name('information');
Route::get('comments', [DashboardController::class, 'comments'])->name('comments');
Route::get('messages', [DashboardController::class, 'messages'])->name('messages');
Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
