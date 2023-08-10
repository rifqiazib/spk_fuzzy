<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\RangkingController;
use App\Http\Controllers\LoginController;

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
    return view('welcome');
});

Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('post.login');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

//ADMIN
Route::get('/home',[AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/userdata',[AdminController::class, 'userdata'])->name('user');
Route::get('/datauser/formuser',[AdminController::class, 'formuser'])->name('form.user');
Route::post('/datauser/create',[AdminController::class, 'createuser'])->name('create.user');
Route::get('/{id}/edituser', [AdminController::class, 'edituser'])->name('user.edit');
Route::post('/{id}/updateuser', [AdminController::class, 'updateuser'])->name('user.update');
Route::get('/{id}/deleteuser', [AdminController::class, 'deleteuser'])->name('user.delete');

Route::get('/pofile',[AdminController::class, 'profile'])->name('profil');
Route::get('/pofile/form',[AdminController::class, 'profileform'])->name('profil.form');
Route::get('/{id}/profil/editprofile', [AdminController::class, 'editprofile'])->name('profile.edit');

Route::get('/candidates',[AdminController::class, 'candidate'])->name('candidate');
Route::get('/candidates/form',[AdminController::class, 'formcandidate'])->name('form.candidate');
Route::post('/candidates/form/create',[AdminController::class, 'createcandidate'])->name('create.candidate');
Route::get('/candidates/{id}/edit', [AdminController::class, 'editcandidate'])->name('edit.candidate');
Route::post('/candidates/{id}/update', [AdminController::class, 'updatecandidate'])->name('update.candidate');
Route::get('/candidates/{id}/delete', [AdminController::class, 'deletecandidate'])->name('delete.candidate');
Route::post('/candidates/importexcel',[AdminController::class, 'importexcel'])->name('importexcel');

Route::get('/criteria',[AdminController::class, 'criteria'])->name('criteria');
Route::get('/criteria', [CriteriaController::class, 'index'])->name('criterias.index');
Route::post('/criteria/create', [CriteriaController::class, 'store'])->name('criterias.store');
Route::delete('/criterias/{criteria_id}', [CriteriaController::class, 'destroy'])->name('criterias.destroy');

Route::get('/criteria/{id}/subcriteria',[AdminController::class, 'subcriteria'])->name('subcriteria');
Route::get('/subcriteria/{id}/formsubcriteria',[AdminController::class, 'formsubcriteria'])->name('form.subcriteria');
Route::post('/subcriteria/form/create',[AdminController::class, 'createsubcriteria'])->name('create.subcriteria');
Route::get('/subcriteria/{id}/edit/{subid}', [AdminController::class, 'editsubcriteria'])->name('edit.subcriteria');
Route::post('/subcriteria/{id}/update', [AdminController::class, 'updatesubcriteria'])->name('update.subcriteria');
Route::delete('/subcriteria/{subcriteria_id}', [AdminController::class, 'destroy'])->name('subcriterias.destroy');

Route::get('/rankings', [RangkingController::class, 'index'])->name('rangking.index');
Route::post('/rankings', [RangkingController::class, 'doRanking'])->name('rankings.do');


//OPERATOR
Route::get('/operator/home',[OperatorController::class, 'dashboard'])->name('operator.dashboard')->middleware('auth');
Route::get('/operator/candidates',[OperatorController::class, 'candidate'])->name('operator.candidate');
Route::get('/operator/candidates/form',[OperatorController::class, 'formcandidate'])->name('operator.form.candidate');
Route::post('/operator/candidates/form/create',[OperatorController::class, 'createcandidate'])->name('operator.create.candidate');
Route::get('/operator/{id}/edit', [OperatorController::class, 'editcandidate'])->name('operator.edit.candidate');
Route::post('/operator/{id}/update', [OperatorController::class, 'updatecandidate'])->name('operator.edit.candidate');
Route::get('/operator/{id}/delete', [OperatorController::class, 'deletecandidate'])->name('operator.delete.candidate');

Route::get('/matrix', [RangkingController::class, 'matrix'])->name('matrix');
