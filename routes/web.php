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

Route::get('/contact', [ContactController::class, 'index']); // フォームページ
Route::post('/contact/confirm', [ContactController::class, 'confirm']); // 確認ページ
Route::post('/contact/thanks', [ContactController::class, 'thanks']); // 完了ページ
