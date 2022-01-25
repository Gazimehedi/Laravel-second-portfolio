<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PortfolioController;

Route::get('/', [FrontendController::class, 'home']);
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');
Route::get('/user/logout',[AdminController::class,'logout'])->name('user.logout');
Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){

// Brand Routes //
    Route::get('/brand',[BrandController::class,'index'])->name('admin.brand');
    Route::post('/brand/create',[BrandController::class,'insert'])->name('admin.brand.create');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('admin.brand.edit');
    Route::put('/brand/update/{id}',[BrandController::class,'update'])->name('admin.brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('admin.brand.delete');
// Slider Routes //
    Route::get('/slider',[SliderController::class,'index'])->name('admin.slider');
    Route::get('/slider/create',[SliderController::class,'create'])->name('admin.slider.create');
    Route::post('/slider/insert',[SliderController::class,'insert'])->name('admin.slider.insert');
    Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('admin.slider.edit');
    Route::put('/slider/update/{id}',[SliderController::class,'update'])->name('admin.slider.update');
    Route::get('/slider/delete/{id}',[SliderController::class,'delete'])->name('admin.slider.delete');
// About Routes //
    Route::get('/about',[AboutController::class,'index'])->name('admin.about');
    Route::put('/about/update/',[AboutController::class,'update'])->name('admin.about.update');
// Services Routes //
    Route::get('/service',[ServiceController::class,'index'])->name('admin.service');
    Route::get('/service/create',[ServiceController::class,'create'])->name('admin.service.create');
    Route::post('/service/insert',[ServiceController::class,'insert'])->name('admin.service.insert');
    Route::get('/service/edit/{id}',[ServiceController::class,'edit'])->name('admin.service.edit');
    Route::put('/service/update/{id}',[ServiceController::class,'update'])->name('admin.service.update');
    Route::get('/service/delete/{id}',[ServiceController::class,'delete'])->name('admin.service.delete');
// Portfolio Routes //
    Route::get('/portfolio',[PortfolioController::class,'index'])->name('admin.portfolio');
    Route::get('/portfolio/create',[PortfolioController::class,'create'])->name('admin.portfolio.create');
    Route::post('/portfolio/insert',[PortfolioController::class,'insert'])->name('admin.portfolio.insert');
    Route::get('/portfolio/edit/{id}',[PortfolioController::class,'edit'])->name('admin.portfolio.edit');
    Route::put('/portfolio/update/{id}',[PortfolioController::class,'update'])->name('admin.portfolio.update');
    Route::get('/portfolio/delete/{id}',[PortfolioController::class,'delete'])->name('admin.portfolio.delete');
// Contact Routes //
    Route::get('/contact/profile',[ContactController::class,'profile'])->name('admin.contact.profile');
    Route::put('/about/update/',[ContactController::class,'profileupdate'])->name('admin.contact.profileupdate');
    Route::get('/contact/message',[ContactController::class,'message'])->name('admin.contact.message');
});
