<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\CandidatoController;

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



Route::get('/',[CandidatesController::class,'home'])->name('home');
Route::get('/resultados',[CandidatesController::class,'resultados'])->name('resultados');

Route::resource('candidates','CandidatoController');
// Route::resource('candidates','CandidatoController');
// Route::resource('/candidates',[CandidatoController::class,'candidato.index'])->name('candidato.index');
/*Route::get('/home', function () {
    return view('home');
});*/

// Route::get('/createCandidateForm', function () {
//     return view('createCandidateForm');
// });
Route::get('createCandidateForm',[CandidatesController::class,'createCandidateForm'])->name('createCandidateForm')->middleware('auth');
Route::post('/createCandidate', [CandidatesController::class, 'createCandidate'])->name('createCandidate')->middleware('auth');
Route::post('/castYourVote', [CandidatesController::class, 'castYourVote'])->name('castYourVote')->middleware('auth');
Route::get("/voting",[CandidatesController::class, 'votingPage'])->name('votingPage')->middleware('auth');
Route::any("/uploadCsv",[CandidatesController::class, 'uploadCsv'])->name('uploadCsv')->middleware('auth');
Route::any("/subir_archivo",[CandidatesController::class, 'subir_archivo'])->name('subir_archivo')->middleware('auth');
Route::get("/modifyCandidateForm",[CandidatesController::class, 'modifyCandidateForm'])->name('modifyCandidateForm')->middleware('auth');
Route::get("/auditoria",[CandidatesController::class, 'auditoria'])->name('auditoria')->middleware('auth');
Route::get("/create",[CandidatesController::class, 'createCandidateForm'])->name('createCandidateForm')->middleware('auth');
Route::get("/edit",[CandidatesController::class, 'editcandidate'])->name('editcandidate')->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/verify','Auth\RegisterController@verifyUser')->name('verify.user');

