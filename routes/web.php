<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Bookings\BookingController;
use App\Http\Controllers\Bookings\DueController;
use App\Http\Controllers\Books\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Students\Auth\StudentAuthController;
use App\Http\Controllers\Students\Auth\StudentController;
use App\Http\Controllers\Students\booksController;
use App\Http\Controllers\Students\StBookController;
use App\Http\Controllers\Students\StProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComingController;

Route::get('coming', [ComingController::class,'soon'])->name('coming soon');
Route::get('search',[SearchController::class, 'search'])->name('search');
Route::resource('booking',BookingController::class);
Route::get('dues',[DueController::class, 'dues'])->name('dues');
//students
Route::get('/',[StudentAuthController::class,'login_page'])->name('student_login_form');
Route::prefix('student')->group(function(){
    Route::get('profile',[StProfileController::class, 'index'])->name('student profile');
    //Route::get('register-form',[StudentAuthController::class, 'register_page'])->name('student_reg_form');
    Route::resource('student', StudentController::class);
    Route::post('login',[StudentAuthController::class, 'loginStudent'])->name('login Student');
    Route::post('logout',[StudentAuthController::class,'logout'])->name('student logout');
    Route::get('digital',[booksController::class, 'digital'])->name('digital');
    Route::resource('books', StBookController::class);
});

Route::get('/admin',[AdminAuthController::class, 'login_form'])->name('admin login page');
//admins
Route::prefix('admin')->group(function(){
    Route::get('profile', [ProfileController::class, 'profile'])->name('admin profile');
    Route::get('/register',[AdminAuthController::class, 'register_form'])->name('admin register page');
    Route::post('/login',[AdminAuthController::class, 'adminLogin'])->name('adminLogin');
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
    Route::post('/logout',[AdminAuthController::class, 'logout'])->name('adminLogout');
    Route::resource('category', CategoryController::class);
    Route::resource('book', BookController::class);
    Route::resource('admin', AdminController::class);
});