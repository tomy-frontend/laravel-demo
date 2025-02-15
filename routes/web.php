<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HilowController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Route;

// 基本的にpathと表示するファイルだけを記述する

// アロー関数でルートを記述する場合
Route::get('/hello-world', fn() => "hello!world!!");

// 連想配列を第二引数を渡すことも可能
Route::get("/hello-var", function () {
    return view("hello-var", [
        'name' => 'とむ',
        'course' => 'laravel'
    ]);
});

// トップページ
Route::get('/', function () {
    return view('index');
});

// curriculumページ
Route::get('/curriculum', function () {
    return view('curriculum');
});


// コントローラーに置き換え
// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);

// リクエスト
Route::get('/form', [RequestSampleController::class, 'form']);
Route::get('/query-strings', [RequestSampleController::class, 'queryStrings']);
Route::get('/user/{id}', [RequestSampleController::class, 'profile'])->name(name: 'profile');
Route::get('/products/{category}/{year}', [RequestSampleController::class, 'productsArchive']);
Route::get('/route-link', [RequestSampleController::class, 'routeLink']);
Route::get('/login', [RequestSampleController::class, 'loginForm']);

// ログイン 名前付きルート"login"
Route::post('/login', [RequestSampleController::class, 'login'])->name(name: 'login');

Route::resource('/events', controller: EventController::class)->only(['create', 'store']);

// ハイローゲーム
Route::get('/hi-low', [HiLowController::class, 'index'])->name('hi-low');
Route::post('/hi-low', [HilowController::class, 'result']);

// ファイル管理
Route::resource('/photos', controller: PhotoController::class)->only(['create', 'store', 'show', 'destroy']);
Route::get('photos/{photo}/download', [PhotoController::class, 'download'])->name('photos.download');
