<?php
// 基本的にpathと表示するファイルだけを記述する

use App\Http\Controllers\GameController;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Route;

// アロー関数でルートを記述する場合
Route::get('/hello-world', fn() => "hello!world!!");

// 連想配列を第二引数を渡すことも可能
Route::get("/hello-var", function () {
    return view("hello-var", [
        'name' => 'とみー',
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
