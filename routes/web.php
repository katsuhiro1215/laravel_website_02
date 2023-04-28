<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeSlideController;
use App\Http\Controllers\PortfolioController;
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

// Route Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        // Logout
        Route::get('/logout', 'destroy')->name('admin.logout');
        // Profile
        Route::get('/profile', 'Profile')->name('admin.profile');
        Route::get('/profile/edit', 'ProfileEdit')->name('admin.profile.edit');
        Route::post('/profile/update', 'ProfileUpdate')->name('admin.profile.update');
        // Change Password
        Route::get('/change/password', 'ChangePassword')->name('admin.change.password');
        Route::post('/update/password', 'UpdatePassword')->name('admin.update.password');
    });
    // Home Slider
    Route::controller(HomeSlideController::class)->prefix('home')->group(function () {
        Route::get('/home_slide/edit', 'edit')->name('home_slide.edit');
        Route::post('/home_slide/update', 'update')->name('home_slide.update');
    });
    // About
    Route::controller(AboutController::class)->prefix('about')->group(function () {
        Route::get('/edit', 'edit')->name('about.edit');
        Route::post('/update', 'update')->name('about.update');
        // Backend Multi Image
        Route::get('/multi_image', 'MultiImageIndex')->name('multi.image'); //index
        Route::get('/multi_image/create', 'MultiImageCreate')->name('multi.image.create'); //create
        Route::post('/multi_image', 'MultiImageStore')->name('store.multi.image'); //store
        Route::get('/multi_image/{id}/edit', 'MultiImageEdit')->name('edit.multi.image'); //edit
        Route::post('/multi_image/update', 'MultiImageUpdate')->name('update.multi.image'); //update
        Route::get('/multi_image/{id}', 'MultiImageDelete')->name('delete.multi.image'); //delete
    });
    // Portfolio
    Route::controller(PortfolioController::class)->prefix('portfolio')->group(function () {
        Route::get('/', 'index')->name('portfolio.index'); //index
        Route::get('/create', 'create')->name('portfolio.create'); //create
        Route::post('/store', 'store')->name('portfolio.store'); //store
        Route::get('/{id}/edit', 'edit')->name('portfolio.edit'); //edit
        Route::post('/update', 'update')->name('portfolio.update'); //update
        Route::get('/{id}', 'delete')->name('portfolio.delete'); //delete
    });
    // Blog Category
    Route::controller(BlogCategoryController::class)->prefix('category-blog')->group(function () {
        Route::get('/', 'index')->name('blog_category.index');
        Route::get('/create', 'create')->name('blog_category.create');
        Route::post('/', 'store')->name('blog_category.store');
        Route::get('/{id}/edit', 'edit')->name('blog_category.edit');
        Route::post('/{id}', 'update')->name('blog_category.update');
        Route::get('/{id}', 'delete')->name('blog_category.delete');
    });
    // Blog
    Route::controller(BlogController::class)->prefix('blog')->group(function () {
        Route::get('/', 'index')->name('blog.index');
        Route::get('/create', 'create')->name('blog.create');
        Route::post('/', 'store')->name('blog.store');
        Route::get('/{id}/edit', 'edit')->name('blog.edit');
        Route::post('/{id}', 'update')->name('blog.update');
        Route::get('/{id}', 'delete')->name('blog.delete');
    });
});


// Frontend
Route::controller(AboutController::class)->prefix('about')->group(function () {
    Route::get('/page', 'About')->name('about');
});
Route::controller(PortfolioController::class)->prefix('portfolio')->group(function () {
    Route::get('/{id}', 'single')->name('portfolio.single');
    Route::get('/page', 'Portfolio')->name('portfolio');
});
Route::controller(BlogController::class)->prefix('blog')->group(function () {
    Route::get('/{id}', 'single')->name('blog.single');
    Route::get('/category/{id}', 'category')->name('blog.category');    
    Route::get('/', 'Blog')->name('blog');
});


// Route::controller()->group(function () {
//     Route::get('/', 'index')->name('footer.index');
//     Route::get('/create', 'create')->name('footer.create');
// });

require __DIR__ . '/auth.php';
