<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\DestinationController;
use App\Http\Controllers\Backend\DestinationPackagesController;
use App\Http\Controllers\Backend\DestinationTypeController;
use App\Http\Controllers\Backend\OwnerController;
use App\Http\Controllers\Backend\PackagesController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\TransportationController;
use App\Models\DestinationType;

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
    Route::get('destination-type/all', [DestinationTypeController::class, 'index'])->name('destination-type.all');
    Route::get('destination-type/create', [DestinationTypeController::class, 'create'])->name('destination-type.create');
    Route::post('destination-type/store', [DestinationTypeController::class, 'store'])->name('destination-type.store');
    Route::get('destination-type/edit/{id}', [DestinationTypeController::class, 'edit'])->name('destination-type.edit');
    Route::post('destination-type/update/{id}', [DestinationTypeController::class, 'update'])->name('destination-type.update');
    Route::get('destination-type/delete/{id}', [DestinationTypeController::class, 'destroy'])->name('destination-type.delete');
    Route::get('destination/all', [DestinationController::class, 'index'])->name('destination.all');
    Route::get('desination/create', [DestinationController::class, 'create'])->name('destination.create');
    Route::post('destination/store', [DestinationController::class, 'store'])->name('destination.store');
    Route::get('destination/edit/{id}', [DestinationController::class, 'edit'])->name('destination.edit');
    Route::post('destination/update/{id}', [DestinationController::class, 'update'])->name('destination.update');
    Route::get('destination/delete/{id}', [DestinationController::class, 'destroy'])->name('destination.delete');
    Route::get('owner/all', [OwnerController::class, 'index'])->name('owner.all');
    Route::get('owner/create', [OwnerController::class, 'create'])->name('owner.create');
    Route::post('owner/store', [OwnerController::class, 'store'])->name('owner.store');
    Route::get('owner/edit/{id}', [OwnerController::class, 'edit'])->name('owner.edit');
    Route::post('owner/update/{id}', [OwnerController::class, 'update'])->name('owner.update');
    Route::get('owner/delete/{id}', [OwnerController::class, 'destroy'])->name('owner.delete');
    Route::get('transportation/all', [TransportationController::class, 'index'])->name('transportation.all');
    Route::get('transportation/create', [TransportationController::class, 'create'])->name('transportation.create');
    Route::post('transportation/store', [TransportationController::class, 'store'])->name('transportation.store');
    Route::get('transportation/edit/{id}', [TransportationController::class, 'edit'])->name('transportation.edit');
    Route::post('transportation/update/{id}', [TransportationController::class, 'update'])->name('transportation.update');
    Route::get('transportation/delete/{id}', [TransportationController::class, 'destroy'])->name('transportation.delete');
    Route::get('packages/all', [PackagesController::class, 'index'])->name('packages.all');
    Route::get('packages/create', [PackagesController::class, 'create'])->name('packages.create');
    Route::post('packages/store', [PackagesController::class, 'store'])->name('packages.store');
    Route::get('packages/edit/{id}', [PackagesController::class, 'edit'])->name('packages.edit');
    Route::post('packages/update/{id}', [PackagesController::class, 'update'])->name('packages.update');
    Route::get('packages/delete/{id}', [PackagesController::class, 'delete'])->name('packages.delete');
    Route::get('destination-packages/all', [DestinationPackagesController::class, 'index'])->name('destination-packages.all');
    Route::get('destination-packages/create', [DestinationPackagesController::class, 'create'])->name('destination-packages.create');
    Route::post('destination-packages/store', [DestinationPackagesController::class, 'store'])->name('destination-packages.store');
    Route::get('destination-packages/edit/{id}', [DestinationPackagesController::class, 'edit'])->name('destination-packages.edit');
    Route::post('destination-packages/update/{id}', [DestinationPackagesController::class, 'update'])->name('destination-packages.update');
    Route::get('destination-packages/delete/{id}', [DestinationPackagesController::class, 'delete'])->name('destination-packages.delete');
});  

Route::get('/get-regency/ajax/{province_id}', [AjaxController::class, 'GetRegency']);
Route::get('/get-district/ajax/{regency_id}', [AjaxController::class, 'GetDisctrict']);
Route::get('/get-village/ajax/{district_id}', [AjaxController::class, 'GetVillage']);
