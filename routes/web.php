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
    // Route::get('/', 'UserTemplate')->name('usertemplate');
});

Route::controller(ClintController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'ProductDetails')->name('productdetails');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
 
});


Route::middleware(['auth', 'verified', 'user'])->group(function () {


    Route::controller(ClintController::class)->group(function () {

        Route::get('/add-to-cart','AddtoCart')->name('addtocart');
        Route::post('/add-product-to-cart','addProductToCart')->name('addproducttocart');
        Route::get('/check-out', 'CheckOutt')->name('checkout');
        Route::post('/shipping-address','GetShippingInfo')->name('shippinginfo');
        Route::get('/shipping-added','ShippingAdded')->name('shippingadded');
        Route::post('/place-order','PlaceOrder')->name('placeorder');
        Route::get('/userprofile', 'UserProfile')->name('userprofile');
        Route::get('/userprofile-pendingorder', 'PendingOrder')->name('pendingorders');
        Route::get('/userprofile-history', 'History')->name('history');
        Route::get('/best-seller', 'BestSeller')->name('bestseller');
        Route::get('/new-release', 'NewRelease')->name('newrelease');
        Route::get('/todays-deal', 'TodeaysDeal')->name('todaysdeal');
        Route::get('/customer-service', 'CustomerService')->name('customerservice');
        Route::get('/remove-cart-item/{id}','RemoveProduct')->name('remove');
    });

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
            Route::get('admin/show-product/{id}/{slug}','showProduct')->name('showproduct');
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