<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeSlideController;
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
    return view('frontend.index');
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

Route::controller(HomeSlideController::class)->group(function () {
    Route::get('home/slide', 'index')->name('home.slide');
    Route::post('home/slider/update', 'update')->name('home.slide.update'); 
});

Route::controller(AboutController::class)->group(function () {
    Route::get('about/page', 'index')->name('about.page');
    Route::post('about/page/update', 'update')->name('about.page.update');

    Route::get('about', 'About')->name('page.about');

    Route::get('about/multi/image', 'AboutMultiImage')->name('about.multi.image'); //create
    Route::post('about/multi/image/store', 'StoreMultiImage')->name('store.multi.image'); //store
    Route::get('all/multi/image', 'AllMultiImage')->name('all.multi.image'); //index
    Route::get('edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image'); //edit
    Route::post('update/multi/image', 'UpdateMultiImage')->name('update.multi.image'); //update
    Route::get('delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image'); //delete
    // showだけがない
});


require __DIR__.'/auth.php';
