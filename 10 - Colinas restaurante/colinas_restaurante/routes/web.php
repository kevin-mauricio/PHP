<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IndexController;


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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* IndexController */
Route::get('/',[IndexController::class,'index'])->name('index');

/* CategoriaController */
Route::get('/categories',[CategoriaController::class,'index'])->name('index_category');
Route::get('/form-create-category',[CategoriaController::class,'createView'])->name('form_category');
Route::post('/store-category',[CategoriaController::class,'store'])->name('store_category');
Route::get('/show-category/{category}',[CategoriaController::class,'show'])->name('show_category');
Route::get('/edit-category/{category}',[CategoriaController::class,'edit'])->name('edit_category');
Route::put('/update-category/{category}',[CategoriaController::class,'update'])->name('update_category');
Route::delete('delete-category/{category}',[CategoriaController::class,'destroy'])->name('delete_category');