<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeesModelController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ContName;
use App\Http\Controllers\ResourcesExampleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('welcome');
})->middleware(['auth'])->name("home");


Route::middleware(['auth'])->group( function() {
    //employees Basic CRUD model
    Route::resource("employees",EmployeesController::class)->middleware(['auth']);
    Route::get("employees/{id}/delete",[EmployeesController::class,'destroy'])->name("employees.delete");

    //employees CRUD full model 
    Route::resource("employees-model",EmployeesModelController::class);
    Route::get("employees-model/{id}/delete",[EmployeesModelController::class,'destroy'])->name("employees-model.delete");
    Route::get('departments',[DepartmentsController::class,'index']);

    Route::get("download-image/{file}",[EmployeesModelController::class,'getFile'])->name('employees-model.download-image');
});

/*Auth*/
Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth'])->name('welocme');

require __DIR__.'/auth.php';