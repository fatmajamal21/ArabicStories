<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisitorController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\WorkerController;

use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




/*
|--------------------------------------------------------------------------
| Admin Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('stories')->name('stories.')->group(function () {
        Route::get('/', [StoryController::class, 'index'])->name('index');
        Route::get('/pending', [StoryController::class, 'pending'])->name('pending');
        Route::get('/create', [StoryController::class, 'create'])->name('create');
        Route::post('/', [StoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [StoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [StoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [StoryController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/approve', [StoryController::class, 'approve'])->name('approve');
        Route::post('/{id}/reject', [StoryController::class, 'reject'])->name('reject');
    });

    Route::prefix('writers')->name('writers.')->group(function () {
        Route::get('/', [WriterController::class, 'index'])->name('index');
        Route::get('/create', [WriterController::class, 'create'])->name('create');
        Route::post('/', [WriterController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [WriterController::class, 'edit'])->name('edit');
        Route::put('/{id}', [WriterController::class, 'update'])->name('update');
        Route::delete('/{id}', [WriterController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/verify', [WriterController::class, 'toggleVerify'])->name('toggleVerify');
    });
    Route::prefix('workers')->name('workers.')->group(function () {
        Route::get('/', [WorkerController::class, 'index'])->name('index');
        Route::get('/create', [WorkerController::class, 'create'])->name('create');
        Route::post('/', [WorkerController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [WorkerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [WorkerController::class, 'update'])->name('update');
        Route::delete('/{id}', [WorkerController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/verify', [WorkerController::class, 'toggleVerify'])->name('toggleVerify');
    });



    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('comments')->name('comments.')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('index');
        Route::delete('/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/export/{type}', [ReportController::class, 'export'])->name('export');
    });

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::post('/', [SettingController::class, 'update'])->name('update');
    });
});

/*
|--------------------------------------------------------------------------
| Visitor Routes (Public)
|--------------------------------------------------------------------------
*/





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [VisitorController::class, 'index'])->name('home');

Route::get('/all_story', [VisitorController::class, 'allStory'])->name('all_story');
Route::get('/all-story', [VisitorController::class, 'allStory'])->name('allStory');

Route::get('/story/{slug}', [VisitorController::class, 'showStory'])->name('story.show');

Route::get('/profile', [VisitorController::class, 'profile'])->name('profile');
Route::get('/about', [VisitorController::class, 'about'])->name('about');

Route::get('/favorites', [VisitorController::class, 'favorites'])->name('favorites');
Route::get('/favorites-folders', [VisitorController::class, 'favoriteFolders'])->name('favorites.folders');
Route::get('/edit-account', [VisitorController::class, 'editAccount'])->name('edit.account');

/*
| لو مشروعك مركّب Breeze أو أي Auth جاهز
| خليه يحمّل routes/auth.php
*/
require __DIR__ . '/auth.php';

/*
| لو مش مركّب Auth جاهز وبتستخدم صفحاتك اليدوية داخل VisitorController
| فك التعليق عن اللي تحت
| ولا تخلط بين الطريقتين في نفس الوقت
*/

Route::get('/login', [VisitorController::class, 'login'])->name('login');
Route::get('/register', [VisitorController::class, 'register'])->name('register');

Route::get('/reset-password', [VisitorController::class, 'resetPassword'])->name('password.request');
Route::get('/code', [VisitorController::class, 'code'])->name('auth.code');
Route::get('/confirmation', [VisitorController::class, 'confirmation'])->name('auth.confirmation');
