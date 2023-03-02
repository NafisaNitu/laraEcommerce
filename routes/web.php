<?php

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Backend\AdminPagesController;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
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

// Important Command
    // php artisan config:cache
    // php artisan view:clear 
    // composer dump-auto


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');
Route::get('/serach',[PagesController::class, 'search'])->name('search');


/*
Product Router
All the routers for our products for frontend
*/
Route::get('/products', [ProductsController::class,'index'])->name('products');
Route::get('/products/{slug}',[ProductsController::class, 'show'])->name('products.show');



// Admin Router

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminPagesController::class,'index'])->name('admin.index');


    // Product Router
        Route::group(['prefix' => '/products'], function(){
            Route::get('/', [AdminProductController::class,'index'])->name('admin.products');
            Route::get('/create', [AdminProductController::class,'create'])->name('admin.product.create');
            Route::post('/store',[AdminProductController::class,'store'])->name('admin.product.store');
            Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('admin.product.edit');
            Route::post('/update/{id}',[AdminProductController::class,'update'])->name('admin.product.update');
            Route::post('/delete/{id}',[AdminProductController::class,'delete'])->name('admin.product.delete');
        });


        // Category Router
        Route::group(['prefix' => '/categories'], function(){
            Route::get('/',[CategoryController::class,'index'])->name('admin.categories');
            Route::get('/create',[CategoryController::class,'create'])->name('admin.category.create');
            Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
            Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
            Route::post('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
            Route::post('/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
        });

        Route::group(['prefix' => '/brands'], function(){
            Route::get('/',[BrandController::class, 'index'])->name('admin.brands');
            Route::get('/create',[BrandController::class,'create'])->name('admin.brands.create');
            Route::post('/store',[BrandController::class,'store'])->name('admin.brands.store');
            Route::get('/edit/{id}',[BrandController::class,'edit'])->name('admin.brands.edit');
            Route::post('/update/{id}',[BrandController::class,'update'])->name('admin.brands.update');
            Route::post('/delete/{id}',[BrandController::class,'delete'])->name('admin.brands.delete');
        });
   
});




