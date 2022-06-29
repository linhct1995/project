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
    Route::get('/Log-in', [UserController::class, 'login'])->name('login.user');
    Route::post('/Log-in', [UserController::class, 'saveLogin']);
    Route::get('/LogOut', [UserController::class, 'logout'])->name('logout');
    Route::get('/Detail/{id}', [ProductController::class, 'detail'])->name('detail.prd');
    Route::post('/Comment', [CommentController::class, 'comment'])->name('comment.prd');

//Admin

