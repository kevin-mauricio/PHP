<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',[CategoriaController::class,'index'])->name('index_category');
Route::get('/form-create-category',[CategoriaController::class,'createView'])->name('form_category');
Route::post('/store-category',[CategoriaController::class,'store'])->name('store_category');