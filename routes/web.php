<?php

use App\Http\Controllers\RepliesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadController;

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

Route::get('/', function () {
    return redirect('/threads');
});

Route::get('/threads', [ThreadController::class, 'index']);
Route::get('/threads/create', [ThreadController::class, 'create']);
Route::post('/threads', [ThreadController::class, 'store']);
Route::get('/threads/{id}', [ThreadController::class, 'show']);
Route::post('/threads/{id}', [ThreadController::class, 'delete']);

Route::post('/replies', [RepliesController::class, 'create']);
Route::post('/replies/{id}', [RepliesController::class, 'delete']);
Route::get('/replies/edit/{id}', [RepliesController::class, 'edit']);
Route::post('/replies/update/{id}', [RepliesController::class, 'update']);


