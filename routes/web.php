<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StoryController;

use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Admin\ContactMessageController;


use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController as ControllersUserController;

/*
|--------------------------------------------------------------------------
| Public Visitor Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [VisitorController::class, 'index'])->name('home');



Route::get('/all-story', [VisitorController::class, 'allStory'])->name('allStory');
Route::get('/all-story', [VisitorController::class, 'allStory'])->name('all_story');

Route::get('/story/{slug}', [VisitorController::class, 'showStory'])->name('story.show');


Route::get('/about', [VisitorController::class, 'about'])->name('about');

Route::get('/contact-us', [ContactController::class, 'create'])
    ->name('contact_us');

Route::post('/contact-us', [ContactController::class, 'store'])
    ->name('contact_us.store');

/*
|--------------------------------------------------------------------------
| Auth Routes (Breeze / Laravel Auth)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Profile Routes (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| User Personal Pages (username based)
|--------------------------------------------------------------------------
| الشكل:
| /@username
| /@username/favorites
| /@username/edit-account
*/



Route::middleware('auth')->prefix('@{username}')->group(function () {

    Route::get('/', [UserController::class, 'profile'])
        ->name('user.profile');

    Route::get('/favorites', [UserController::class, 'favorites'])
        ->name('user.favorites');


    Route::get('/edit-account', [UserController::class, 'editAccount'])
        ->name('user.editAccount');

    Route::post('/edit-account', [UserController::class, 'updateAccount'])
        ->name('user.editAccount.update');
});
Route::middleware('auth')->group(function () {

    Route::get('/favorites/folders', [FavoriteController::class, 'folders'])
        ->name('favorites.folders');

    Route::post('/favorites', [FavoriteController::class, 'store'])
        ->name('favorites.store');

    Route::post('/favorites/folder', [FavoriteController::class, 'createFolder'])
        ->name('favorites.folder.create');

    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])
        ->name('favorites.destroy');
});



/*
|--------------------------------------------------------------------------
| Admin Auth
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');






/*
|--------------------------------------------------------------------------
| Admin Panel (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

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

        Route::get('/', [AdminUserController::class, 'index'])->name('index');

        Route::get('/{id}/edit', [AdminUserController::class, 'edit'])->name('edit');

        Route::put('/{id}', [AdminUserController::class, 'update'])->name('update');

        Route::delete('/{id}', [AdminUserController::class, 'destroy'])->name('destroy');
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

    Route::prefix('contact-messages')
        ->name('contact-messages.')
        ->group(function () {

            Route::get('/', [ContactMessageController::class, 'index'])
                ->name('index');

            Route::delete('/{id}', [ContactMessageController::class, 'destroy'])
                ->name('destroy');
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
| Password Reset
|--------------------------------------------------------------------------
*/

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');
