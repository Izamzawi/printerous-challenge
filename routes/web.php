<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\OrganizationController;

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

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::get('/admin', [UserController::class, 'admin'])->name('admin');
Route::get('/register', [UserController::class, 'create']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/admin', [UserController::class, 'registerAdmin']);
Route::post('/register', [UserController::class, 'registerManager']);
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::group( ['middleware' => 'auth'], function(){
    Route::get('/', [OrganizationController::class, 'index'])->name('home');
    Route::get('/create', [OrganizationController::class, 'create']);
    Route::post('/store', [OrganizationController::class, 'store']);
    Route::get('/organization/{organization}', [OrganizationController::class, 'show']);
    Route::get('/edit/{organization}', [OrganizationController::class, 'edit']);
    Route::put('/update/{organization}', [OrganizationController::class, 'update']);
    Route::delete('/delete/{organization}', [OrganizationController::class, 'destroy']);
    
    Route::prefix('organization/{organization}')->group(function(){
        Route::get('/newPerson', [PersonController::class, 'create']);
        Route::post('/newPerson', [PersonController::class, 'store']);
        Route::get('/person/{person}', [PersonController::class, 'show']);
        Route::get('/updatePerson/{person}', [PersonController::class, 'edit']);
        Route::post('/updatePerson/{person}', [PersonController::class, 'update']);
        Route::delete('/person/{person}', [PersonController::class, 'destroy']);
    });
});
