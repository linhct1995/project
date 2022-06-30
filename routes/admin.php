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


Route::match(['get', 'post'], '/Login', [UserController::class, 'saveAdminLogin'])->name('login');
Route::get('/LogoutAdmin', [UserController::class, 'logoutAdmin'])->name('logout.admin');
Route::get('/registrationAdmin', [UserController::class, 'registrationAdmin'])->middleware('check-role-admin')->name('admin.register');
Route::post('/registrationAdmin', [UserController::class, 'saveRegistrationAdmin']);
Route::middleware('auth:admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    Route::prefix('product')->group(function () {
        Route::get('create', [ProductController::class, 'create'])->name('create.prd');
        Route::post('create', [ProductController::class, 'saveAdd']);
        Route::get('list', [ProductController::class, 'list'])->name('list.prd');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->middleware('check-role-admin')->name('delete.prd');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit.prd');
        Route::post('edit/{id}', [ProductController::class, 'saveEdit']);
    });
    Route::prefix('attribute')->group(function () {
        Route::get('create', [AttributeController::class, 'create'])->name('create.attribute');
        Route::post('create', [AttributeController::class, 'saveAdd']);
        Route::get('list', [AttributeController::class, 'list'])->name('list.attribute');
        Route::get('delete/{id}', [AttributeController::class, 'delete'])->middleware('check-role-admin')->name('delete.attribute');
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
        Route::get('delete/{id}', [CateController::class, 'delete'])->middleware('check-role-admin')->name('delete.cate');
        Route::get('edit/{id}', [CateController::class, 'edit'])->name('edit.cate');
        Route::post('edit/{id}', [CateController::class, 'saveEdit']);
    });
    Route::prefix('brand')->group(function () {
        Route::get('create', [BrandingController::class, 'create'])->name('create.brand');
        Route::post('create', [BrandingController::class, 'saveBrand']);
        Route::get('list', [BrandingController::class, 'list'])->name('list.brand');
        Route::get('delete/{id}', [BrandingController::class, 'delete'])->middleware('check-role-admin')->name('delete.brand');
        Route::get('edit/{id}', [BrandingController::class, 'edit'])->name('edit.brand');
        Route::post('edit/{id}', [BrandingController::class, 'saveEdit']);
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
