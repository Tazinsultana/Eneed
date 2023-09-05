<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
  

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::get('/admin/all-category', 'AllCategory')->name('allcategory');
    });

    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::get('/admin/all-subcategory', 'AllSubCategory')->name('allsubcategory');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::get('/admin/all-product', 'AllProduct')->name('allproduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pendingorder', 'PendingOrder')->name('pendingorder');
        Route::get('/admin/confirmedorder', 'ConfirmedOrder')->name('confirmedorder');
        Route::get('/admin/cancelledorder', 'CancelledOrder')->name('cancelledorder');
    });
});
});
require __DIR__ . '/auth.php';