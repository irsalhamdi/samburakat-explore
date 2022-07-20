<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('role')->group(function(){
    Route::get('all-admin', [RoleController::class, 'admin'])->name('role.admin');
    Route::get('all-users', [RoleController::class, 'users'])->name('role.users');
});

Route::middleware(['auth:admin'])->group(function(){

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {return view('admin.index');})->name('dashboard')->middleware('auth:admin');
    
    Route::get('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::get('admin/profile/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('admin/profile/store', [AdminProfileController::class, 'update'])->name('admin.profile.store');
    Route::get('admin/change-password', [AdminProfileController::class, 'changePassword'])->name('admin.change-password');
    Route::post('admin/update-password', [AdminProfileController::class, 'updatePassword'])->name('admin.update-password');
});  