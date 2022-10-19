<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\AuthController;
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);


// 一覧画面
Route::get('/home', [PostController::class, 'index']);

Route::prefix('post')->group(function (){
    // // 一覧画面
    // Route::get('index', [PostController::class, 'index']);
    // 作成画面 // カテゴリー一覧が必要
    Route::get('create', [PostController::class, 'create'])->middleware('auth')->name('post.create');
    // 編集画面
    Route::get('edit/{id}', [PostController::class, 'edit'])->middleware('auth')->name('post.edit');
    // カテゴライズされた投稿一覧画面
    Route::get('category/{id}', [PostController::class, 'edit'])->name('post.category');
    // 作成
    Route::post('upsert', [PostController::class, 'upsert'])->middleware('auth');
    // 削除
    Route::post('destroy', [PostController::class, 'destroy'])->middleware('auth');
    // 個別の投稿画面
    Route::get('{id}', [PostController::class, 'show'])->name('post.show');
});

Route::prefix('user')->group(function (){
    // 一覧画面
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    // 作成画面
    // Route::get('create', [UserController::class, 'index']);
    // 編集画面
    Route::get('edit/{id}', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');
    // ユーザー画面
    Route::get('{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('{id}/likes', [UserController::class, 'show'])->name('user.likes');
    Route::get('{id}/follows', [UserController::class, 'show'])->name('user.follows');
    Route::get('{id}/followers', [UserController::class, 'show'])->name('user.followers');
    // 作成
    // Route::post('create', [UserController::class, 'create']);
    // 編集
    Route::post('update', [UserController::class, 'update'])->middleware('auth');
    // 削除
    Route::post('destroy', [UserController::class, 'destroy'])->middleware('auth');
    // フォロー
    Route::post('follow/{id}', [FollowController::class, 'follow']);
    Route::post('unfollow/{id}', [FollowController::class, 'unfollow']);
    // Route::get('ffcheck/{id}', [FollowController::class, 'ffcheck']);
});

Route::group(['middleware' => 'auth'], function () {
});

// =============== fallback 404 ===============
Route::fallback(function () {
	return redirect('/');
});
