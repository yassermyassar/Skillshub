<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatController as AdminCatController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ExamController as AdminExamController;
use App\Http\Controllers\Admin\MessgeController;
use App\Http\Controllers\Admin\SkillsController as AdminSkillsController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\web\CatController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\ExamController;
use App\Http\Controllers\web\homeController;
use App\Http\Controllers\web\LangController;
use App\Http\Controllers\web\SkillController;
use App\Http\Controllers\web\ProfileController;
use App\Mail\ContactResponseMail;
use App\Models\Exam;
use Illuminate\Support\Facades\Route;
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

Route::middleware('lang')->group(function () {
    Route::get('/categories/show/{id}', [CatController::class, 'show']);
    Route::get('/skills/show/{id}', [SkillController::class, 'show']);
    Route::get('/exam/show/{id}', [ExamController::class, 'show']);
    Route::get('/exams/questions/{id}', [ExamController::class, 'questions'])->middleware(['auth', 'verified', 'student']);
    Route::get('/contact', [ContactController::class, 'index'])->middleware('verified');
    Route::post('contact/message', [ContactController::class, 'send']);
    Route::get('profile', [profileController::class, 'index'])->middleware(['auth', 'verified', 'student']);

    Route::get('/', [homeController::class, 'index']);
});
Route::post('exams/start/{id}', [ExamController::class, 'start'])->middleware(['auth', 'verified', 'student']);
Route::post('exams/submit/{id}', [ExamController::class, 'submitt'])->middleware(['auth', 'verified']);
Route::get('/lang/set/{lang}', [LangController::class, 'set']);



Route::prefix("/dashboard")->middleware(['auth', 'verified', 'can-enter-Dash'])->group(function () {
    Route::get("/", [AdminHomeController::class, 'index']);
    Route::get("/categories", [AdminCatController::class, 'index']);
    Route::post("/categories/store", [AdminCatController::class, 'store']);
    Route::post("/categories/update", [AdminCatController::class, 'update']);
    Route::get("/categories/toggle/{cat}", [AdminCatController::class, 'toggle']);
    Route::get("/categories/delete/{cat}", [AdminCatController::class, 'delete']);




    Route::get("/skills", [AdminSkillsController::class, 'index']);
    Route::post("/skills/store", [AdminSkillsController::class, 'store']);
    Route::post("/skills/update", [AdminSkillsController::class, 'update']);
    Route::get("/skills/toggle/{skill}", [AdminSkillsController::class, 'toggle']);
    Route::get("/skills/delete/{skill}", [AdminSkillsController::class, 'delete']);

    Route::get("/exams", [AdminExamController::class, 'index']);

    Route::get("/exams/create", [AdminExamController::class, 'create']);
    Route::get("/exams/show/{exam}", [AdminExamController::class, 'show']);
    Route::get("/exams/edit/{exam}", [AdminExamController::class, 'edit']);
    Route::post("/exams/edit/{exam}", [AdminExamController::class, 'update']);
    Route::get("/exams/edit/{exam}/{question}", [AdminExamController::class, 'editQuestion']);
    Route::post("/exams/edit/{exam}/{question}", [AdminExamController::class, 'updateQuestion']);
    Route::get("/exams/show/{exam}/questions", [AdminExamController::class, 'showQues']);
    Route::get("/exams/{exam}/questions/create", [AdminExamController::class, 'CreateQues']);
    Route::post("/exams/{exam}/questions/store", [AdminExamController::class, 'StoreQues']);
    Route::post("/exams/store", [AdminExamController::class, 'store']);
    Route::post("/exams/update", [AdminExamController::class, 'update']);
    Route::get("/exams/toggle/{exam}", [AdminExamController::class, 'toggle']);
    Route::get("/exams/delete/{exam}", [AdminExamController::class, 'delete']);
    Route::get("/students", [StudentController::class, 'index']);
    Route::get("/students/show-score/{id}", [StudentController::class, 'showScore']);
    Route::get("/students/open-exam/{examId}/{studentId}", [StudentController::class, 'openExam']);
    Route::get("/students/close-exam/{examId}/{studentId}", [StudentController::class, 'CloseExam']);

    Route::middleware('superadmin')->group(function () {
        Route::get("/admins", [AdminController::class, 'index']);
        Route::get("/admins/create", [AdminController::class, 'create']);
        Route::post("/admins/store", [AdminController::class, 'store']);
        Route::get("/admins/promote/{id}", [AdminController::class, 'promote']);
        Route::get("/admins/demote/{id}", [AdminController::class, 'demote']);
    });
    Route::get('messages', [MessgeController::class, 'index']);
    Route::get('messages/show/{id}', [MessgeController::class, 'show']);
    Route::post('messages/respond/{message}', [MessgeController::class, 'respond']);
});
