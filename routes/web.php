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
    return view('welcome');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('adminUsers');
Route::get('/admin/updateDetails', [App\Http\Controllers\AdminController::class, 'update'])->name('adminUpdate');
Route::post('/admin/updateDetails', [App\Http\Controllers\AdminController::class, 'updateDetails'])->name('adminUpdateDetails');
Route::get('/admin/createAdmin',[App\Http\Controllers\AdminController::class, 'createAdminView'])->name('admin.createAdminView');
Route::post('/admin/createAdmin',[App\Http\Controllers\AdminController::class, 'createAdmin'])->name('admin.createAdmin');
Route::get('/admin/createSubAdmin',[App\Http\Controllers\AdminController::class, 'createSubAdminView'])->name('admin.createSubAdminView');
Route::post('/admin/createSubAdmin',[App\Http\Controllers\AdminController::class, 'createSubAdmin'])->name('admin.createSubAdmin');


Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/getUsers',[App\Http\Controllers\UserController::class, 'getUsers']);


Route::get('/sub-admin', [App\Http\Controllers\SubAdminController::class, 'index'])->name('subAdmin');
Route::get('/sub-admin/users', [App\Http\Controllers\SubAdminController::class, 'users'])->name('subAdmin.users');
Route::get('/sub-admin/get-users/{id}', [App\Http\Controllers\SubAdminController::class, 'getUsers']);
Route::get('/sub-admin/create', [App\Http\Controllers\SubAdminController::class, 'addUserView'])->name('subAdmin.addUser');
Route::post('/sub-admin/create', [App\Http\Controllers\SubAdminController::class, 'addUser'])->name('subAdmin.addUser');