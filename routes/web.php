<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleCategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[FrontendController::class,'Index'])->name('home');

Route::get('/seller-register',[UserController::class,'SellerRegister'])->name('seller.register');
Route::post('/seller-register',[UserController::class,'SellerRegisterPost'])->name('seller.register.post');

Route::get('/login',[UserController::class,'Login'])->name('login');
Route::post('/login',[UserController::class,'LoginPost'])->name('login.post');

Route::get('/forgot-password',[UserController::class,'ForgotPassword'])->name('forgot.password');
Route::post('/forgot-password',[UserController::class,'ForgotPasswordPost'])->name('forgot.password.post');

Route::get('/verify-otp',[UserController::class,'VerifyEmail'])->name('verify.otp');
Route::post('/verify-otp',[UserController::class,'VerifyEmailPost'])->name('verify.otp.post');

Route::get('/reset-password',[UserController::class,'ResetPassword'])->name('reset.password');
Route::post('/reset-password',[UserController::class,'ResetPasswordPost'])->name('reset.password.post');

Route::get('/customer-register',[CustomerController::class,'CustomerRegister'])->name('customer.register');
Route::post('/customer-register',[CustomerController::class,'CustomerRegisterPost'])->name('customer.register.post');

Route::get('/customer-login',[CustomerController::class,'CustomerLogin'])->name('customer.login');
Route::post('/customer-login',[CustomerController::class,'CustomerLoginPost'])->name('customer.login.post');
//User Route
Route::get('/user_category',[CategoryController::class,'UserCategory'])->name('user.category');
// routes/web.php
Route::get('/load-more-products', [ProductController::class, 'loadMoreProducts'])->name('load.more.products');




//Admin Dashboard

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [UserController::class, 'Dashboard'])->name('dashboard');
    Route::get('/logout', [UserController::class, 'Logout'])->name('logout');

    Route::prefix('category')->group(function () {
        Route::get('/list', [CategoryController::class, 'List'])->name('category.list');
        Route::get('/add', [CategoryController::class, 'Create'])->name('category.create');
        Route::post('/add', [CategoryController::class, 'Store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'Edit'])->name('category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'Update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'Delete'])->name('category.delete');
    });
    Route::prefix('sub_category')->group(function () {
        Route::get('/list', [SubCategoryController::class, 'List'])->name('sub.category.list');
        Route::get('/add', [SubCategoryController::class, 'Create'])->name('sub.category.create');
        Route::post('/add', [SubCategoryController::class, 'Store'])->name('sub.category.store');
        Route::get('/edit/{id}', [SubCategoryController::class, 'Edit'])->name('sub.category.edit');
        Route::post('/edit/{id}', [SubCategoryController::class, 'Update'])->name('sub.category.update');
        Route::get('/delete/{id}', [SubCategoryController::class, 'Delete'])->name('sub.category.delete');
    });
    Route::prefix('sale_category')->group(function () {
        Route::get('/list', [SaleCategoryController::class, 'List'])->name('sale.category.list');
        Route::get('/add', [SaleCategoryController::class, 'Create'])->name('sale.category.create');
        Route::post('/add', [SaleCategoryController::class, 'Store'])->name('sale.category.store');
        Route::get('/edit/{id}', [SaleCategoryController::class, 'Edit'])->name('sale.category.edit');
        Route::post('/edit/{id}', [SaleCategoryController::class, 'Update'])->name('sale.category.update');
        Route::get('/delete/{id}', [SaleCategoryController::class, 'Delete'])->name('sale.category.delete');
    });

    Route::prefix('/brand')->group(function () {
        Route::get('/list', [BrandController::class, 'BrandList'])->name('brand.list');
        Route::get('/add', [BrandController::class, 'BrandCreate'])->name('brand.create');
        Route::post('/add', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::post('/edit/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    });

    Route::prefix('/product')->group(function () {
        Route::get('/list', [ProductController::class, 'ProductList'])->name('product.list');
        Route::get('/add', [ProductController::class, 'ProductCreate'])->name('product.create');
        Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    });

});





