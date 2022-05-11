<?php

use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\FrontController;
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
//FrontEnd
Route::get('/', [FrontController::class,'index'])->name('front.index');
Route::get('/List-Cart', [CartController::class,'ListCart'])->name('list.cart');
Route::get('/AddCart/{id}', [CartController::class,'AddCart'])->name('add.cart');
Route::get('/DeleteItemCart/{id}', [CartController::class,'DeleteItemCart'])->name('delete.cart');
Route::get('/Delete-List-ItemCart/{id}', [CartController::class,'DeleteListItemCart'])->name('delete.itemcart');
Route::get('/Save-List-ItemCart/{id}/{quanty}', [CartController::class,'SaveListItemCart'])->name('save.itemcart');
Route::get('/Check-Out', [CartController::class,'Checkout'])->name('checkout');
Route::post('/Check-Out', [CartController::class,'SaveCheckout']);
//Admin
Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    Route::prefix('product')->group(function () {
        Route::get('create', [ProductController::class, 'create'])->name('create.prd');
        Route::post('create', [ProductController::class, 'saveAdd']);
        Route::get('list', [ProductController::class, 'list'])->name('list.prd');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete.prd');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit.prd');
        Route::post('edit/{id}', [ProductController::class, 'saveEdit']);
    });
    Route::prefix('cate')->group(function () {
        Route::get('create', [CateController::class, 'create'])->name('create.cate');
        Route::post('create', [CateController::class, 'saveCate']);
        Route::get('list', [CateController::class, 'list'])->name('list.cate');
        Route::get('delete/{id}', [CateController::class, 'delete'])->name('delete.cate');
        Route::get('edit/{id}', [CateController::class, 'edit'])->name('edit.cate');
        Route::post('edit/{id}', [CateController::class, 'saveEdit']);
    });
    Route::prefix('cart')->group(function () {
        Route::get('list', [AdminCartController::class, 'list'])->name('admin.list.cart');
        Route::get('order_detail/{id}', [AdminCartController::class, 'orderDetail'])->name('admin.order_detail');
        
    });
   
});
