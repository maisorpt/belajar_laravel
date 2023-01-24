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
Route::resource('/groups', \App\Http\Controllers\GroupController::class);
Route::resource('/members', \App\Http\Controllers\MemberController::class);
Route::resource('/presences', \App\Http\Controllers\PresenceController::class);
Route::resource('/schedules', \App\Http\Controllers\ScheduleController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


