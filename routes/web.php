<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route Admin
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/logout', 'destroy')->name('admin.logout');

    Route::get('admin/profile', 'Profile')->name('admin.profile');
    Route::get('admin/profile/edit', 'ProfileEdit')->name('admin.profile.edit');
    Route::post('admin/profile/update', 'ProfileUpdate')->name('admin.profile.update');

    Route::get('admin/change/password', 'ChangePassword')->name('admin.change.password');
    Route::post('admin/update/password', 'UpdatePassword')->name('admin.update.password');
});



require __DIR__.'/auth.php';
