<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExcelController;
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

Route::get('/', function () {
    return view('layout');
});
Route::resource('students', StudentController::class);

Route::get('export', [StudentExcelController::class, 'export'])->name('export');
Route::get('import',[StudentExcelController::class,'importForm'])->name('importForm');
Route::post('import', [StudentExcelController::class, 'import'])->name('import');

Route::get('format', [StudentExcelController::class, 'format'])->name('format');