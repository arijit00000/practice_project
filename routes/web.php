<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Calling\callingController;
use App\Http\Controllers\Calling\FeedbackController;
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

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

// Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function(){return view('dashboard');})->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // for calling
    Route::get('/calling', [callingController::class, 'openPage'])->name('open.page');
    Route::get('/calling-list', [callingController::class, 'loadData'])->name('load.data');
    Route::post('/submit-data', [callingController::class, 'submitData'])->name('submit.data');
    Route::post('/edit-fill/{id?}',[callingController::class, 'editFillData'])->name('edit.fill.data');
    Route::post('/list/delete/{id?}',[callingController::class, 'deleteData'])->name('delete.data');
    Route::get('calling/card',[callingController::class, 'card'])->name('card');
    // for calling feedback
    Route::get('/feedback', [FeedbackController::class, 'feedBack'])->name('feedback');
    Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedBack'])->name('submit.feedback');
    Route::get('/feedback/edit/{idi}', [FeedbackController::class, 'editFeedBack'])->name('edit.feedback');
    Route::get('/feedback/delete/{idi}', [FeedbackController::class, 'deleteFeedBack'])->name('delete.feedback');
    // Route::get('/feedback/delete', [callingController::class, 'deleteFeedBack'])->name('delete.feedback');

    // for social media
});

require __DIR__.'/auth.php';
