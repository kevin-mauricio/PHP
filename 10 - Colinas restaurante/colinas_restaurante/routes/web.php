<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PlatoController;


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

/* PlatoController */
Route::get('/plates', [PlatoController::class, 'index'])->name('index_plate');
Route::get('/form-create-plate', [PlatoController::class, 'createView'])->name('form_plate');
Route::post('/store-plate', [PlatoController::class, 'store'])->name('store_plate');
Route::get('/plates-by-category/{id_category}', [PlatoController::class, 'getPlateByCategory'])->name('plate_by_category');
Route::put('/update-plate/{plate}', [PlatoController::class, 'update'])->name('update_plate');
Route::get('/edit-plate/{plate}', [PlatoController::class, 'edit'])->name('edit_plate');
Route::delete('/delete-plate/{plate}', [PlatoController::class, 'destroy'])->name('delete_plate');