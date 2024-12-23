<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

//System
Route::get('/system', [SystemController::class, 'index']);

//System Access
Route::get('/system-access', [AccessController::class, 'index']);
Route::get('/logout', [AccessController::class, 'systemLogout']);
Route::post('/access', [AccessController::class, 'accessSystem']);

//Branch
Route::get('/branch-list', [BranchController::class,'branchList']);
Route::get('/branch-add', [BranchController::class,'branchAdd']);
Route::get('/branch-edit/{id}', [BranchController::class,'branchEdit']);
Route::get('/delete-branch/{id}', [BranchController::class,'deleteBranch']);
Route::post('/add-branch', [BranchController::class,'addBranch']);
Route::post('/edit-branch/{id}', [BranchController::class, 'editBranch']);
Route::get('/filter-branch', [BranchController::class, 'filterBranch']);

//Position
Route::get('/position-list', [PositionController::class,'positionList']);
Route::get('/position-add', [PositionController::class,'positionAdd']);
Route::get('/position-edit/{id}', [PositionController::class,'positionEdit']);
Route::get('/delete-position/{id}', [PositionController::class,'deletePostion']);
Route::post('/add-position', [PositionController::class,'addPostion']);
Route::post('/edit-position/{id}', [PositionController::class, 'editPostion']);
Route::get('/filter-position', [PositionController::class, 'filterPostion']);

//Unit
Route::get('/unit-list', [UnitController::class,'unitList']);
Route::get('/unit-add', [UnitController::class,'unitAdd']);
Route::get('/unit-edit/{id}', [UnitController::class,'unitEdit']);
Route::get('/delete-unit/{id}', [UnitController::class,'deleteUnit']);
Route::post('/add-unit', [UnitController::class,'addUnit']);
Route::post('/edit-unit/{id}', [UnitController::class, 'editUnit']);
Route::get('/filter-unit', [UnitController::class, 'filterUnit']);

//Product
// Route::get('/product-list', [ProductController::class,'productList']);
// Route::get('/product-add', [ProductController::class,'productAdd']);
// Route::get('/product-edit/{id}', [ProductController::class,'productEdit']);
// Route::post('/add-product', [ProductController::class,'addProduct']);
// Route::get('/delete-product/{id}', [ProductController::class,'deleteProduct']);
// Route::post('/edit-product/{id}', [ProductController::class, 'editProduct']);
// Route::get('/filter-product', [ProductController::class, 'filterProduct']);

