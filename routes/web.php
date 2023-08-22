<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

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


//Only Authenticated User Can Access this
    Route::group(['middleware' => 'auth'] , (function () {
        
        // Tasks Routes
        Route::get('tasks', [TaskController::class, 'index'])->name('tasks');
        Route::get('tasks-add', [TaskController::class, 'create'])->name('tasks_add');
        Route::post('tasks-store', [TaskController::class, 'store'])->name('tasks_store');
        Route::get('tasks-edit/{id}', [TaskController::class, 'edit'])->name('tasks_edit');
        Route::put('tasks-update/{id}', [TaskController::class, 'update'])->name('tasks_update');
        Route::get('tasks-delete/{id}', [TaskController::class, 'destroy'])->name('tasks_delete');
        Route::get('filter/{status}', [TaskController::class, 'filter'])->name('tasks_filter');
        Route::get('title-asc-sorting', [TaskController::class, 'titleAcsSorting'])->name('title_asc_sorting');
        Route::get('title-desc-sorting', [TaskController::class, 'titleDescSorting'])->name('title_desc_sorting');
        Route::get('date-asc-sorting', [TaskController::class, 'dateAcsSorting'])->name('date_asc_sorting');
        Route::get('date-desc-sorting', [TaskController::class, 'dateDescSorting'])->name('date_desc_sorting');
        Route::get('status-asc-sorting', [TaskController::class, 'statusAcsSorting'])->name('status_asc_sorting');
        Route::get('status-desc-sorting', [TaskController::class, 'statusDescSorting'])->name('status_desc_sorting');
    }));



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
