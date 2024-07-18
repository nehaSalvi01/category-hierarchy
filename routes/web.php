<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/categoryTree', [CategoryController::class, 'categoryTree'])->name('categories.categoryTree');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



Route::get('/subcategories/index', [SubCategoryController::class, 'index'])->name('subcategories.index');
Route::get('/subcategories/create', [SubCategoryController::class, 'create'])->name('subcategories.create');
Route::post('/subcategories/store', [SubCategoryController::class, 'store'])->name('subcategories.store');
Route::get('/subcategories/show/{id}', [SubCategoryController::class, 'show'])->name('subcategories.show');
Route::get('/subcategories/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategories.edit');
Route::put('/subcategories/update/{id}', [SubCategoryController::class, 'update'])->name('subcategories.update');
Route::delete('/subcategories/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');





