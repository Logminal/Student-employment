<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EnterprisesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SpecializationsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UserController;
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
    return view('authForm');
})->name('home');

Route::get('/main', [MainController::class, 'indexMain'])->name('main');

Route::resource('/enterprises', EnterprisesController::class);
Route::delete('/enterproses/delete', [EnterprisesController::class, 'deleteUp'])->name('deleteUp');

Route::resource('/student', StudentsController::class);

Route::resource('/teachers', TeachersController::class);

Route::resource('/specializations', SpecializationsController::class);
Route::get('/specializations/show/{kodSpec}', [SpecializationsController::class, 'showAllStudentsSpec'])->name('showAllStudentsSpec');
Route::post('/specializations/filter', [SpecializationsController::class, 'filter'])->name('specializations.filter');

Route::post('/docum/add', [DocumentsController::class, 'store'])->name('docum.add');

Route::resource('/user', UserController::class);
Route::post('/user/change/password/{id}', [UserController::class, 'changePassword'])->name('changePassword');

Route::resource('/new', NewsController::class);

Route::get('/profile/{id}', [UserController::class, 'showProfile'])->name('user.show.profile');

Route::post('/profile/enterprises/name/store/{id}', [UserController::class, 'enterprisesNameStore'])->name('enterprisesNameStore');
// Добавление в таблицу ОЖИДАНИЕ ДОБАВ. НАЗВАНИЕ ОРГАНИЗАЦИИ
Route::post('/enterprises/add/writing/{id}', [EnterprisesController::class, 'addWriting'])->name('add.writing');
// Добавление в таблицу ОРГАНИЗАЦИИ. НАЗВАНИЕ
Route::post('/enterprises/add/{id}', [EnterprisesController::class, 'addEnterprise'])->name('add.enterprise');
// Добавление в таблицу ОРГАНИЗАЦИИ. САМУ ОРГАНИЗАЦИЮ
Route::post('/enterprises/add', [EnterprisesController::class, 'enterprisesAdd'])->name('enterprises.add');

Route::controller(UserController::class)->group(function () {
    Route::post('/auth', 'auth')->name('auth');
    Route::post('/reg', 'storeReg')->name('storeReg');
    Route::post('/logout', 'logout')->name('logout');
});
