<?php

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
    return view('indek');
});

// Route::get('/test1', function () {
//     $data = App\Test1::all();
//     return view('test1', ['data' => $data]);
// });

// Santri koding #1
Route::resource('/students', \App\Http\Controllers\StudentController::class);
// Route::put('students/{students}', 'StudentController@update')->name('students.update');
// Route::get('students/{students}/edit', 'StudentController@edit')->name('students.edit');

// MalasNgoding
Route::get('belajar', [App\Http\Controllers\BelajarlagiController::class, 'index']);
Route::get('pelajar/{nama}', [App\Http\Controllers\PelajarController::class, 'index']);
Route::get('/formulir', [App\Http\Controllers\PelajarController::class, 'formulir']);
Route::post('/formulir/proses', [App\Http\Controllers\PelajarController::class, 'proses']);

//Santri koding #2
Route::resource('/student_as', \App\Http\Controllers\Student_aController::class);
Route::resource('/classrooms', \App\Http\Controllers\ClassroomController::class);
Route::resource('/groups', \App\Http\Controllers\GroupController::class);
Route::resource('/members', \App\Http\Controllers\MemberController::class);
Route::resource('/presences', \App\Http\Controllers\PresenceController::class);
Route::resource('/schedules', \App\Http\Controllers\ScheduleController::class);
Route::get('/attendance', [\App\Http\Controllers\PresenceController::class, 'attendance'])->name('presences.attendance');
Route::post('/attendance/proses', [\App\Http\Controllers\PresenceController::class, 'attendance_store'])->name('presences.attendances');
Route::get('/quizzes/{classroom}', [\App\Http\Controllers\QuizzController::class, 'quizzes'])->name('quizzes.quizzes');
Route::get('/quizzes/{classroom}/{quizze}/{test_id}/{number}', [\App\Http\Controllers\QuizzController::class, 'quizze'])->name('quizzes.quizze');
Route::post('/quizze/store/{classroom}/{quizze}/{test_id}/{number}', [\App\Http\Controllers\QuizzController::class, 'submit'])->name('quizzes.submit');
Route::post('/quizze/store', [\App\Http\Controllers\QuizzController::class, 'complete'])->name('quizzes.complete');
Route::get('/quizzes/details/{question_id}', [\App\Http\Controllers\QuizzController::class, 'detail_answers'])->name('quizzes.details');
Route::get('/quizze/detail/{question_id}/{test_id}', [\App\Http\Controllers\QuizzController::class, 'detail_answer'])->name('quizzes.detail');
Route::resource('/quizzes', \App\Http\Controllers\QuizzController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/student_as', [App\Http\Controllers\Student_aController::class, 'index'])->name('student_as');
    Route::get('/classrooms', [App\Http\Controllers\ClassroomController::class, 'index'])->name('classrooms');
    Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('groups');
    Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('members');
    Route::get('/presences', [App\Http\Controllers\PresenceController::class, 'index'])->name('presences');
    Route::get('/schedules', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedules');
});

