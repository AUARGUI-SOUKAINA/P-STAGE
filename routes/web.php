<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TimetableController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'index']);

//lists
Route::get('/studentsList',[StudentController::class, 'index'])->name('listS');
Route::get('/teacherList',[TeacherController::class, 'index'])->name('listT');

// Timetable Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/timetables', [TimetableController::class, 'index'])->name('timetable.index');
    Route::get('/timetables/create', [TimetableController::class, 'create'])->name('timetable.create'); // New route for create view
    Route::post('/timetables', [TimetableController::class, 'store'])->name('timetable.store'); // Add route to handle form submission
    Route::get('/timetables/{id}/edit', [TimetableController::class, 'edit'])->name('timetable.edit');
    Route::put('/timetables/{id}', [TimetableController::class, 'update'])->name('timetable.update');
    Route::get('/timetables/show', [TimetableController::class, 'show'])->name('timetable.show');//timetable every group group
    Route::delete('/timetables/{timetable}', [TimetableController::class, 'destroy'])->name('timetable.destroy');

});

//Groups/admin
Route::get('/Groups',[GroupController::class, 'index'])->name('groups');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');

//delete+edit+add:student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/students/add', [StudentController::class, 'createS'])->name('students.add');
Route::post('/students', [StudentController::class, 'storeS'])->name('students.store');

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}/update', [StudentController::class, 'update'])->name('students.update');






//delete+edit+add:teacher
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::get('/teachers/add', [TeacherController::class, 'createT'])->name('teachers.add');
Route::post('/teachers', [TeacherController::class, 'storeT'])->name('teachers.store');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
