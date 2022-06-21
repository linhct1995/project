<?php

use App\Http\Controllers\Admin\Attribute_ValueController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandingController;
use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\CateController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Properties_PrdController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\FrontController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
//FrontEnd
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/List-Cart', [CartController::class, 'ListCart'])->name('list.cart');
Route::get('/AddCart/{id}', [CartController::class, 'AddCart'])->name('add.cart');
Route::get('/DeleteItemCart/{id}', [CartController::class, 'DeleteItemCart'])->name('delete.cart');
Route::get('/Delete-List-ItemCart/{id}', [CartController::class, 'DeleteListItemCart'])->name('delete.itemcart');
Route::get('/Save-List-ItemCart/{id}/{quanty}', [CartController::class, 'SaveListItemCart'])->name('save.itemcart');
Route::get('/Check-Out', [CartController::class, 'Checkout'])->name('checkout');
Route::post('/Check-Out', [CartController::class, 'SaveCheckout']);
Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration', [UserController::class, 'saveRegistration']);
Route::get('/Log-in', [UserController::class, 'login'])->name('login');
Route::post('/Log-in', [UserController::class, 'saveLogin']);
Route::get('/LogOut', [UserController::class, 'logout'])->name('logout');
Route::get('/Detail/{id}', [ProductController::class, 'detail'])->name('detail.prd');
Route::post('/Comment', [CommentController::class, 'comment'])->name('comment.prd');
//Admin
Route::get('/Login', [UserController::class, 'loginAdmin'])->name('login.admin');
Route::post('/Login', [UserController::class, 'saveAdminLogin']);
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
    Route::prefix('attribute')->group(function () {
        Route::get('create', [AttributeController::class, 'create'])->name('create.attribute');
        Route::post('create', [AttributeController::class, 'saveAdd']);
        Route::get('list', [AttributeController::class, 'list'])->name('list.attribute');
        Route::get('delete/{id}', [AttributeController::class, 'delete'])->name('delete.attribute');
        Route::get('edit/{id}', [AttributeController::class, 'edit'])->name('edit.attribute');
        Route::post('edit/{id}', [AttributeController::class, 'saveEdit']);
    });
    Route::prefix('attribute_values')->group(function () {
        Route::get('create', [Attribute_ValueController::class, 'create'])->name('create.attribute_values');
        Route::post('create', [Attribute_ValueController::class, 'saveAdd']);
        // Route::get('list', [ProductController::class, 'list'])->name('list.prd');
        // Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete.prd');
        // Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit.prd');
        // Route::post('edit/{id}', [ProductController::class, 'saveEdit']);
    });
    Route::prefix('cate')->group(function () {
        Route::get('create', [CateController::class, 'create'])->name('create.cate');
        Route::post('create', [CateController::class, 'saveCate']);
        Route::get('list', [CateController::class, 'list'])->name('list.cate');
        Route::get('delete/{id}', [CateController::class, 'delete'])->name('delete.cate');
        Route::get('edit/{id}', [CateController::class, 'edit'])->name('edit.cate');
        Route::post('edit/{id}', [CateController::class, 'saveEdit']);
    });
    Route::prefix('brand')->group(function () {
        Route::get('create', [BrandingController::class, 'create'])->name('create.brand');
        Route::post('create', [BrandingController::class, 'saveBrand']);
        Route::get('list', [BrandingController::class, 'list'])->name('list.brand');
        // Route::get('delete/{id}', [CateController::class, 'delete'])->name('delete.cate');
        // Route::get('edit/{id}', [CateController::class, 'edit'])->name('edit.cate');
        // Route::post('edit/{id}', [CateController::class, 'saveEdit']);
    });
    Route::prefix('cart')->group(function () {
        Route::get('list', [AdminCartController::class, 'list'])->name('admin.list.cart');
        Route::get('order_detail/{id}', [AdminCartController::class, 'orderDetail'])->name('admin.order_detail');
    });
    Route::prefix('comment')->group(function () {
        Route::get('list', [CommentController::class, 'list'])->name('admin.list.comment');
        Route::post('savecheckcomment/{id}', [CommentController::class, 'saveCheckComment'])->name('admin.savecheck.comment');
    });
});
