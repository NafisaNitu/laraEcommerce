<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\CategoriesController;
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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');




/*
Product Router
All the routers for our products for frontend
*/

Route::group(['prefix' => 'products'],function(){
    Route::get('/', [ProductsController::class,'index'])->name('products');
    Route::get('/{slug}',[ProductsController::class, 'show'])->name('products.show');
    Route::get('/serach',[PagesController::class, 'search'])->name('search');
    Route::get('/categories',[CategoriesController::class,'index'])->name('categories.index');
    Route::get('/category/{id}',[CategoriesController::class,'show'])->name('categories.show');
});




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


// User Authentication

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
