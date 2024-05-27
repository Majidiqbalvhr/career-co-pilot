<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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
    return view('index');
});
Route::get('/login',[AuthController::class,'view_login'])->name('login');
Route::post('/loginProcess',[AuthController::class,'Login'])->name('login.process');
Route::get('/RegistrationPage',[AuthController::class,'createregistration'])->name('create.registration');
Route::post('/Registration',[AuthController::class,'Registration'])->name('register');

Route::middleware('auth')->group(function(){
Route::resource('permissions',PermissionController::class);
Route::resource('roles',RoleController::class);
//Route::resource('products',ProductController::class);
Route::POST('permissions/update', [PermissionController::class, 'permissionsUpdate'])->name('permissions.update');

});
//Route::resource('products',ProductController::class);
