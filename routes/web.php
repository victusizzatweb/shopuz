<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
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


Route::get('/admin', function () {
    return view('dashboard.index');
});
Route::get("/trash",[ProductController::class,'trash'])->name('trash');
Route::put("/product{id}/restore",[ProductController::class,'restore'])->name('product.restore');
Route::put("/brand{id}/restore",[BrandController::class,'restore'])->name('brand.restore');
Route::put("/category{id}/restore",[CategoryController::class,'restore'])->name('category.restore');
Route::resource("/category",CategoryController::class);
Route::resource("/brand",BrandController::class);
Route::resource("/product",ProductController::class);
Route::get(" / ",[PageController::class,'index'])->name('index');
Route::get("single/{id} ",[PageController::class,'single'])->name('single');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
