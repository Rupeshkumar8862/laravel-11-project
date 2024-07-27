<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/productf',[ProductController::class,'index'])->name('productf.index');
// Route::get('/productf/create',[ProductController::class,'create'])->name('productf.create');
// Route::POST('/productf',[ProductController::class,'store'])->name('productf.store');
// Route::GET('/productf/{id}/edit',[ProductController::class,'edit'])->name('productf.edit');
// Route::put('/productf/{id}',[ProductController::class,'update'])->name('productf.update');
// Route::delete('/productf/{id}',[ProductController::class,'destroy'])->name('productf.destroy');


Route::controller(ProductController::class)->group(function(){
    Route::get('/productf','index')->name('productf.index');
    Route::get('/productf/create','create')->name('productf.create');
    Route::POST('/productf','store')->name('productf.store');
    Route::GET('/productf/{id}/edit','edit')->name('productf.edit');
    Route::put('/productf/{id}','update')->name('productf.update');
    Route::delete('/productf/{id}','destroy')->name('productf.destroy');
});
