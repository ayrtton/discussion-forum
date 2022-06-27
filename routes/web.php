<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
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
    return view('home');
})->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 
    'verified',
    'role:admin',
])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('roles.permissions');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::prefix('tags')->group(function() {
        Route::get('trash', [TagController::class, 'trash'])->name('tags.trash');
        Route::get('restore/{id}', [TagController::class, 'restore'])->name('tags.restore');
        Route::get('permanentlyDelete/{id}', [TagController::class, 'permanentlyDelete'])->name('tags.permanentlyDelete');
    });

    Route::resource('tags', TagController::class);
});


