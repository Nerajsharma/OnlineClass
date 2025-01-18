<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'check.status']], function () {
    // notice
    Route::get('/dashboard', [NoticeController::class, 'index'])->name('dashboard.index');
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');

    // student
    Route::get('/dashboard/student', [StudentController::class, 'index'])->name('student.index');
    Route::post('/dashboard/user/{id}/approve', [StudentController::class, 'approve'])->name('users.approve');
    Route::post('/dashboard/user/{id}/block', [StudentController::class, 'block'])->name('users.block');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
