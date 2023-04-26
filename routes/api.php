<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;
use App\Http\Controllers\Api\bukuController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#route untuk studentController

Route::get('students', [studentController::class, 'index']);
Route::post('students', [studentController::class, 'store']);
Route::get('students/{id}', [studentController::class, 'show']);
Route::get('students/{id}/edit', [studentController::class, 'edit']);
Route::put('students/{id}/edit', [studentController::class, 'update']);
Route::delete('students/{id}/delete', [studentController::class, 'destroy']);

#route untuk bukuController
Route::get('buku', [bukuController::class, 'index']);
Route::post('buku', [bukuController::class, 'store']);
Route::get('buku/{id}', [bukuController::class, 'show']);
Route::delete('buku/{id}/delete', [bukuController::class, 'destroy']);