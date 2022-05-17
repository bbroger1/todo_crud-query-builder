<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

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

Route::prefix('/tasks')->group(function () {
    Route::get('/', [ToDoController::class, 'index'])->name('tasks.index');

    Route::get('add', [ToDoController::class, 'create'])->name('tasks.create');
    Route::post('add', [ToDoController::class, 'store'])->name('tasks.store');

    Route::get('edit/{id}', [ToDoController::class, 'edit'])->name('tasks.edit');
    Route::post('edit/{id}', [ToDoController::class, 'update'])->name('tasks.update');

    Route::post('delete/{id}', [ToDoController::class, 'destroy'])->name('tasks.delete');
    Route::get('mark/{id}', [ToDoController::class, 'mark'])->name('tasks.mark');
});
