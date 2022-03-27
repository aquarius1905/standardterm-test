<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

//お問い合わせページ
Route::get('/', [ContactController::class, 'index'])->name('index');
//確認ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
//送信完了/入力修正
Route::post('/send', [ContactController::class, 'send'])->name('send');
//管理システム
Route::get('/management', [ContactController::class, 'management'])->name('management');
//検索
Route::get('/search', [ContactController::class, 'search'])->name('search');
//削除
Route::post('/delete/{id}', [ContactController::class, 'delete'])->name('delete');