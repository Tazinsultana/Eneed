<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\ClintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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
})->middleware(['auth'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::controller(UserController::class)->group(function () {
    Route::get('/homepage', 'Home')->name('home');
    Route::get('/', 'UserTemplate')->name('usertemplate');
});

Route::controller(ClintController::class)->group(function () {
    Route::get('/category', 'CategoryPage')->name('category');
    Route::get('/single-product','SingleProduct')->name('product');
    Route::get('/add-to-cart','AddtoCart')->name('addtocart');
    Route::get('/check-out','CheckOutt')->name('cheackout');
    Route::get('/userprofile','UserProfile')->name('userprofile');
    Route::get('/best-seller','BestSeller')->name('bestseller');
    Route::get('/new-release','NewRelease')->name('newrelease');
    Route::get('/todays-deal','TodeaysDeal')->name('todaysdeal');
    Route::get('/customer-service','CustomerService')->name('customerservice');
});


Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');



        Route::controller(CategoryController::class)->group(function () {
            Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
            Route::get('/admin/all-category', 'Index')->name('allcategory');
            Route::post('admin/store-category', 'StoreCategory')->name('storecategory');
            Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
            Route::post('admin/update-category', 'UpdateCategory')->name('updatecategory');
            Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
        });

        Route::controller(SubcategoryController::class)->group(function () {
            Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
            Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
            Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
            Route::get('/admin/edit-subcatgory/{id}', 'EditSubCategory')->name('editsubcategory');
            Route::post('/admin/update-subcategory', 'UpdateSubCategory')->name('updatesubcategory');
            Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcategory');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
            Route::get('/admin/all-product', 'Index')->name('allproduct');
            Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
            Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
            Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
            Route::get('/admin/edit-image/{id}', 'EditProductImage')->name('editproductimage');
            Route::post('admin/update-image', 'UpdateproductImage')->name('updateproductimg');
            Route::get('/admi/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
        });
        Route::controller(OrderController::class)->group(function () {
            Route::get('/admin/pendingorder', 'PendingOrder')->name('pendingorder');
            Route::get('/admin/confirmedorder', 'ConfirmedOrder')->name('confirmedorder');
            Route::get('/admin/cancelledorder', 'CancelledOrder')->name('cancelledorder');
        });
    });

  

});


// Route::get('/home',[@UserController::class,'Home');
require __DIR__ . '/auth.php';