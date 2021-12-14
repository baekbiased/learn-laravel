<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/user/{id?}', function (Request $request, $id) {
    return 'User '.$id;
});

Route::redirect('/', '/dashboard');

Route::group(
    ['middleware' => 'auth'],
    function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/product/getProducts', [ProductController::class, 'getProducts'])->name('products.getProducts');
        Route::get('/product/exportToCSV', [ProductController::class, 'exportToCSV'])->name('products.exportToCSV');
        Route::resource('product', ProductController::class);
    }
);


//route modal binding
Route::get('aaa/{user:email}', [ProductController::class, 'index']);

//Route::get('/product/index', [ProductController::class, 'index'])->name('products');
//Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
//Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
//Route::post('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
//Route::post('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//Route::patch('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');


