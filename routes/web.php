<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ControlerClasses;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TestapiController;
Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'check.status', 'role:admin']], function () {
    // notice
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
    Route::get('/dashboard/batches/view-details/{id}', [BatchController::class, 'view'])->name('batches.viewdetails');
    Route::delete('/dashboard/batches/{id}', [BatchController::class, 'destroy'])->name('batches.destroy');

    // class
    Route::post('/dashboard/class', [ControlerClasses::class, 'store'])->name('classes.store');
    Route::get('/dashboard/class/end/{id}', [ControlerClasses::class, 'end'])->name('classes.end');

    // material
    Route::post('/dashboard/materials/store', [MaterialController::class, 'store'])->name('materials.store');

    // project
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::post('/projects/extract/{project_id}', [ProjectController::class, 'extractZip'])->name('projects.extract');

    // Route::get('/dashboard/project', [ProjectController::class, 'index'])->name('project.index');
// notes
    Route::post('/dashboard/notes/store', [NoteController::class, 'store'])->name('notes.store');
    Route::delete('/dashboard/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');



    // update password
    // Route::get('/dashboard/ChangePassword', [ProfileEditController::class, 'updateprofile'])->name('updatepassword.index');
});

// Route::get('/dashboard/notes', function () {
//     return view('admin.notes');
// })->name('notes.index');


// for all the user that are log in
Route::group(['middleware' => ['auth', 'check.status']], function () {
    // dashboard
    Route::get('/dashboard', [NoticeController::class, 'index'])->name('dashboard.index');
    // class
    Route::get('/dashboard/class', [ControlerClasses::class, 'index'])->name('class.index');
    // material
    Route::get('/dashboard/material', [MaterialController::class, 'index'])->name('material.index');
    // notes
    Route::get('/dashboard/notes/', [NoteController::class, 'index'])->name('notes.index');
    // project
    Route::get('/dashboard/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/projects/download/{project_id}', [ProjectController::class, 'downloadProject'])->name('projects.download');

    // playground
    Route::get('/dashboard/playground', function () {
        return view('admin.playground');
    })->name('playground.index');

    // whiteboard
    Route::get('/dashboard/whiteboard', function () {
        return view('admin.whiteboard');
    })->name('whiteboard.index');
    // project
    Route::post('/project/store', [ProjectController::class, 'store'])->name('project.store');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// --------------Test api ----------------
Route::get('/testapi', [TestapiController::class, 'index'])->name('profile.destroy');

require __DIR__ . '/auth.php';
