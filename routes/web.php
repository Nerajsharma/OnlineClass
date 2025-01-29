<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ControlerClasses;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\BatchController;
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'check.status', 'role:admin']], function () {
    // notice
    Route::get('/dashboard', [NoticeController::class, 'index'])->name('dashboard.index');
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');

    // student
    Route::get('/dashboard/student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/dashboard/user/{id}/approve', [StudentController::class, 'approve'])->name('users.approve');
    Route::post('/dashboard/user/{id}/block', [StudentController::class, 'block'])->name('users.block');
    Route::get('/dashboard/users/{id}/edit', [StudentController::class, 'edit'])->name('users.edit');
    Route::put('/dashboard/users/{id}', [StudentController::class, 'update'])->name('users.update');

    // batch
    Route::get('/dashboard/Batch', [BatchController::class, 'index'])->name('batch.index');
    Route::post('/dashboard/batches/store', [BatchController::class, 'store'])->name('batches.store');

    // class
    Route::get('/dashboard/class', [ControlerClasses::class, 'index'])->name('class.index');
    Route::post('/dashboard/class', [ControlerClasses::class, 'store'])->name('classes.store');
    Route::get('/dashboard/class/end/{id}', [ControlerClasses::class, 'end'])->name('classes.end');

    // material
    Route::get('/dashboard/material', [MaterialController::class, 'index'])->name('material.index');

});

Route::get('/dashboard/notes', function () {
    return view('admin.notes');
})->name('notes.index');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
