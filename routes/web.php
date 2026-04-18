<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
})->name('home');

Route::middleware(['auth','permission:view dashboard'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');

    Route::resource('users', UserController::class)->middleware('permission:view users');;
});

Route::controller(RoleController::class)->middleware(['auth','permission:view roles'])->group(function () {
    Route::get('/roles', 'index')->name('roles.index');
    Route::get('/roles/create', 'create')->name('roles.create');
    Route::post('/roles', 'store')->name('roles.store');
    Route::get('/roles/{id}', 'edit')->name('roles.edit');
    Route::put('/roles/{id}', 'update')->name('roles.update');
    Route::delete('/roles/{id}', 'destroy')->name('roles.destroy');
});

// Route::controller(MenuController::class)->middleware(['auth','permission:view roles'])->group(function () {
//     Route::get('/menus', 'index')->name('menus.index');
//     Route::get('/menus/create', 'create')->name('menus.create');
//     Route::post('/menus', 'store')->name('menus.store');
// });

Route::controller(PermissionController::class)->middleware(['auth','permission:view permissions'])->group(function () {
    Route::get('/permissions', 'index')->name('permissions.index');
    Route::get('/permissions/create', 'create')->name('permissions.create');
    Route::post('/permissions', 'store')->name('permissions.store');
    Route::get('/permissions/{id}', 'edit')->name('permissions.edit');
    Route::put('/permissions/{id}', 'update')->name('permissions.update');
});

Route::controller(CityController::class)->middleware(['auth','permission:view cities'])->group(function () {
    Route::get('/cities', 'index')->name('cities.index');
    Route::get('/cities/create', 'create')->name('cities.create');
    Route::post('/cities', 'store')->name('cities.store');


    // Barangays routes
    Route::get('/cities/{city}', 'indexBarangays')->name('cities.barangays.index');
    Route::get('/cities/barangays/{city}', 'createBarangay')->name('cities.barangays.create');
    Route::post('/cities/barangays/{city}', 'storeBarangay')->name('cities.barangays.store');
});

require __DIR__ . '/auth.php';
