<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 写真一覧
    Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');

    // 写真アップロードフォーム
    Route::get('/photos/create', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('photos',        [PhotoController::class, 'store'])->name('photo.store');

    // 写真詳細
    Route::get('photos/{id}', [PhotoController::class, 'show'])->name('photos.show');


    // 写真、編集&更新フォーム
    Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photo.edit');
    Route::patch('/photos/{photo}', [PhotoController::class, 'update'])->name('photo.update');


    // 写真削除
    Route::delete('/photos/{id}', [PhotoController::class, 'destroy'])->name('photo.destroy');

    // ユーザー一覧
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // ユーザー詳細
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    // ユーザー編集
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // ユーザー編集更新
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');


});

require __DIR__.'/auth.php';
