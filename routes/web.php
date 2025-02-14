<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//System
Route::get('/system', [SystemController::class, 'index']);

//System Access
Route::get('/system-access', [AccessController::class, 'index']);
Route::get('/logout', [AccessController::class, 'systemLogout']);
Route::post('/access', [AccessController::class, 'systemAccess']);

//Branch
Route::get('/branch-list', [BranchController::class,'branchList']);
Route::get('/branch-add', [BranchController::class,'branchAdd']);
Route::get('/branch-edit/{id}', [BranchController::class,'branchEdit']);
Route::get('/delete-branch/{id}', [BranchController::class,'deleteBranch']);
Route::post('/add-branch', [BranchController::class,'addBranch']);
Route::post('/edit-branch/{id}', [BranchController::class, 'editBranch']);
Route::get('/filter-branch', [BranchController::class, 'filterBranch']);

//Product
Route::get('/product-list', [ProductController::class,'productList']);
Route::get('/product-add', [ProductController::class,'productAdd']);
Route::get('/product-edit/{id}', [ProductController::class,'productEdit']);
Route::post('/add-product', [ProductController::class,'addProduct']);
Route::get('/delete-product/{id}', [ProductController::class,'deleteProduct']);
Route::post('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::get('/filter-product', [ProductController::class, 'filterProduct']);