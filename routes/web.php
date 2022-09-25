<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});
Auth::routes();

Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


// Admin Role
Route::prefix('admin')->middleware('can:admin-higher')->group(function () {
    Route::get('questionnaire/create', [QuestionnaireController::class, 'create'])->name('questionnaire.create');
    Route::post('questionnaire/store', [QuestionnaireController::class, 'store'])->name('questionnaire.store');
    Route::get('questionnaire/{questionnaire:uuid}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
    Route::delete('questionnaire/{questionnaire}', [QuestionnaireController::class, 'destroy'])->name('questionnaire.delete');
    
    Route::get('questionnaire/{questionnaire}/question/create', [QuestionController::class, 'create'])->name('questionnaire.question.create');
    Route::post('questionnaire/{questionnaire}/question/store', [QuestionController::class, 'store'])->name('questionnaire.question.store');
    Route::get('questionnaire/{questionnaire:uuid}/{question}chart', [QuestionController::class, 'chart'])->name('questionnaire.question.chart');
    Route::delete('questionnaire/{questionnaire}/question/{question}', [QuestionController::class, 'destroy'])->name('questionnaire.question.delete');
});


// User Role
Route::middleware('can:user-higher')->group(function () {
    Route::get('users/mypage', [UserController::class, 'index'])->name('users.mypage');
    Route::get('users/questionnaire/{questionnaire:uuid}', [UserController::class, 'show'])->name('show.questionnaire');
    
    Route::get('survey/{questionnaire:uuid}', [SurveyController::class, 'survey'])->name('survey');
    Route::post('survey/{questionnaire:uuid}', [SurveyController::class, 'store'])->name('survey.store');
    Route::get('thanks', [SurveyController::class, 'thanks'])->name('thanks');
});