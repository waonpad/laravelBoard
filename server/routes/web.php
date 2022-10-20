<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
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

// idは1文字以上の数字(RouteServiceProviderで定義)

// 一覧画面
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/home', [PostController::class, 'index'])->name('home');

Route::prefix('post')->group(function (){
    // 作成画面
    Route::get('create', [PostController::class, 'create'])->middleware('auth')->name('post.manage');
    // 編集画面
    Route::get('edit/{id}', [PostController::class, 'edit'])->middleware('auth')->name('post.manage');
    // カテゴライズされた投稿一覧画面
    Route::get('category/{id}', [PostController::class, 'category'])->name('post.category');
    // 作成
    Route::post('upsert', [PostController::class, 'upsert'])->middleware('auth');
    // 削除
    Route::post('destroy/{id}', [PostController::class, 'destroy'])->middleware('auth');
    // いいね / いいね解除
    Route::post('liketoggle/{id}', [likeController::class, 'likeToggle'])->middleware('auth');
    // 個別の投稿画面
    Route::get('{id}', [PostController::class, 'show'])->name('post.show'); // No view
    // フォローしているユーザーの投稿一覧
    Route::get('follows', [PostController::class, 'follows'])->name('post.follows');
});

Route::prefix('user')->group(function (){
    // 一覧画面
    Route::get('index', [UserController::class, 'index'])->name('user.index'); // No view
    // 編集画面
    Route::get('edit', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');
    // ユーザー画面
    Route::get('{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('{id}/likes', [UserController::class, 'show'])->name('user.likes');
    Route::get('{id}/follows', [UserController::class, 'show'])->name('user.follows');
    Route::get('{id}/followers', [UserController::class, 'show'])->name('user.followers');
    // 編集
    Route::post('update', [UserController::class, 'update'])->middleware('auth');
    // 削除
    Route::post('destroy', [UserController::class, 'destroy'])->middleware('auth'); // No view
    // フォロー / フォロー解除
    Route::post('followtoggle/{id}', [FollowController::class, 'followToggle']);
});

Route::group(['middleware' => 'auth'], function () {
});

// =============== fallback 404 ===============
Route::fallback(function () {
	return redirect('/');
});