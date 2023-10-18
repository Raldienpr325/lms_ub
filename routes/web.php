<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegister;
use App\Http\Controllers\AdminController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('register-mhs', [LoginRegister::class, 'register_mhs'])->name('register-mhs');
Route::post('login-mhs', [LoginRegister::class, 'login_mhs'])->name('login-mhs');

Route::get('login_admin',[AdminController::class,'login_admin'])->name('login_admin');


Route::post('handle-admin-login', [AdminController::class, 'handleAdmin'])->name('handle-admin');

Route::group(['middleware' => 'admin'],function(){
    Route::get('dashboard-admin', [AdminController::class, 'DashboardAdmin'])->name('dashboard-admin');
    Route::resource('pertemuan',AdminController::class)->except('show');
    Route::resource('quiz',QuizController::class);
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [FeatureController::class, 'index'])->name('dashboard');
    Route::get('materi-1', [FeatureController::class, 'materi_1'])->name('materi-1');
    Route::get('quiz-1', [FeatureController::class, 'quiz_1'])->name('quiz-1');
    Route::get('quiz-2', [FeatureController::class, 'quiz_2'])->name('quiz-2');
    Route::get('soal-quiz-1', [FeatureController::class, 'soal_quiz_1'])->name('soal-quiz-1');
    Route::get('soal-quiz-2', [FeatureController::class, 'soal_quiz_2'])->name('soal-quiz-2');
    Route::get('nilai-1', [FeatureController::class, 'nilai_1'])->name('nilai-1');
    Route::get('get-data-quiz-1', [FeatureController::class, 'get_data_quiz_1'])->name('get-data-quiz-1');
    Route::post('submit-data-quiz-1', [FeatureController::class, 'submit_data_quiz_1'])->name('submit-data-quiz-1');
});



