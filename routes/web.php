<?php
use App\Http\Controllers\TodolistController;
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

Route::get('/dashboard',[TodolistController::class,'index'])->name('index')->middleware(['auth']);
Route::post('store',[TodolistController::class,'store'])->name('store')->middleware(['auth']);
Route::delete('/dashboard/{todolist:id}',[TodolistController::class,'destroy'])->name('destroy')->middleware(['auth']);

Route::get('/', function () {
    return view('welcome');
});



Route::get('/account', function () {
    return view('accountdisplay');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

