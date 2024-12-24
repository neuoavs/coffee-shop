<?php

use App\Http\Controllers\AccessController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ViolationController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BranchEmployeeController;
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

//Menu
Route::get('/menu-list', [MenuController::class,'menuList']);
Route::get('/menu-add', [MenuController::class,'menuAdd']);
Route::get('/menu-edit/{id}', [MenuController::class,'menuEdit']);
Route::get('/delete-menu/{id}', [MenuController::class,'deleteMenu']);
Route::post('/add-menu', [MenuController::class,'addMenu']);
Route::post('/edit-menu/{id}', [MenuController::class, 'editMenu']);
Route::get('/filter-menu', [MenuController::class, 'filterMenu']);

//Violation
Route::get('/violation-list', [ViolationController::class,'violationList']);
Route::get('/violation-add', [ViolationController::class,'violationAdd']);
Route::get('/violation-edit/{id}', [ViolationController::class,'violationEdit']);
Route::get('/delete-violation/{id}', [ViolationController::class,'deleteViolation']);
Route::post('/add-violation', [ViolationController::class,'addViolation']);
Route::post('/edit-violation/{id}', [ViolationController::class, 'editViolation']);
Route::get('/filter-violation', [ViolationController::class, 'filterViolation']);

//Shift
Route::get('/shift-list', [ShiftController::class,'shiftList']);
Route::get('/shift-add', [ShiftController::class,'shiftAdd']);
Route::get('/shift-edit/{id}', [ShiftController::class,'shiftEdit']);
Route::get('/delete-shift/{id}', [ShiftController::class,'deleteShift']);
Route::post('/add-shift', [ShiftController::class,'addShift']);
Route::post('/edit-shift/{id}', [ShiftController::class, 'editShift']);
Route::get('/filter-shift', [ShiftController::class, 'filterShift']);


//Product
Route::get('/product-list', [ProductController::class,'productList']);
Route::get('/product-add', [ProductController::class,'productAdd']);
Route::get('/product-edit/{id}', [ProductController::class,'productEdit']);
Route::post('/add-product', [ProductController::class,'addProduct']);
Route::get('/delete-product/{id}', [ProductController::class,'deleteProduct']);
Route::post('/edit-product/{id}', [ProductController::class, 'editProduct']);
Route::get('/filter-product', [ProductController::class, 'filterProduct']);

//Employee
Route::get('/employee-list', [EmployeeController::class,'employeeList']);
Route::get('/employee-add', [EmployeeController::class,'employeeAdd']);
Route::get('/employee-edit/{id}', [EmployeeController::class,'employeeEdit']);
Route::post('/add-employee', [EmployeeController::class,'addEmployee']);
Route::get('/delete-employee/{id}', [EmployeeController::class,'deleteEmployee']);
Route::post('/edit-employee/{id}', [EmployeeController::class, 'editEmployee']);
Route::get('/filter-employee', [EmployeeController::class, 'filterEmployee']);


// Branch Employee
Route::get('/branch-employee-list', [BranchEmployeeController::class,'branchEmployeeList']);
Route::get('/branch-employee-add', [BranchEmployeeController::class,'branchEmployeeAdd']);
Route::get('/branch-employee-edit/{id}', [BranchEmployeeController::class,'branchEmployeeEdit']);
Route::post('/add-branch-employee', [BranchEmployeeController::class,'addBranchEmployee']);
Route::get('/delete-branch-employee/{id}', [BranchEmployeeController::class,'deleteBranchEmployee']);
Route::post('/edit-branch-employee/{id}', [BranchEmployeeController::class, 'editBranchEmployee']);
Route::get('/filter-branch-employee', [BranchEmployeeController::class, 'filterBranchEmployee']);

//Employee
Route::get('/item-list', [ItemController::class,'itemList']);
Route::get('/item-add', [ItemController::class,'itemAdd']);
Route::get('/item-edit/{id}', [ItemController::class,'itemEdit']);
Route::post('/add-item', [ItemController::class,'addItem']);
Route::get('/delete-item/{id}', [ItemController::class,'deleteItem']);
Route::post('/edit-item/{id}', [ItemController::class, 'editItem']);
Route::get('/filter-item', [ItemController::class, 'filterItem']);