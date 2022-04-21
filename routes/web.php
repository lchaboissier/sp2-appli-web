<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PractitionerController;
use App\Http\Controllers\EmployeeController;


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

// Route::redirect('/', 'login');
Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::middleware(\App\Http\Middleware\CheckToken::class)->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('visit', VisitController::class);
    Route::resource('practitioner', PractitionerController::class);
    Route::get('/visit', [VisitController::class, 'index'])->name('visit.index');
    Route::get('/visit/{visit}', [VisitController::class, 'show'])->name('visit.show');
    Route::post('/visit/createConfirmationVisit', [VisitController::class, 'createConfirmationVisit'])->name('visit.createConfirmationVisit');
    Route::post('/practitioner/createConfirmationPractitioner', [PractitionerController::class, 'createConfirmationPractitioner'])->name('practitioner.createConfirmationPractitioner');
    Route::put('/practitioner/editConfirmationPractitioner', [PractitionerController::class, 'editConfirmationPractitioner'])->name('practitioner.editConfirmationPractitioner');
    Route::get('practitioner/{practitioner}/edit',[PractitionerController::class, 'edit'])->name('practitioner.edit');
    Route::get('profile',[EmployeeController::class, 'show'])->name('profile.show');
    Route::get('profile/{profile}/avatar',[EmployeeController::class, 'editAvatar'])->name('profile.editAvatar');
    Route::get('visit/{visit}/delete',[VisitController::class, 'delete'])->name('visit.delete');
    Route::put('visit/{visit}/destroy', [VisitController::class, 'destroy'])->name('visit.destroy');
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
});
