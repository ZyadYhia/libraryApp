<?php

use App\Http\Controllers\ApiCatController;
use App\Http\Controllers\ApiBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/cats', [ApiCatController::class, 'index']);
Route::get('/cats/show/{id}', [ApiCatController::class, 'show']);
Route::post('/cats/store', [ApiCatController::class, 'store']);
Route::post('/cats/update/{id}', [ApiCatController::class, 'update']);
Route::get('/cats/delete/{id}', [ApiCatController::class, 'delete']);

Route::get('/books', [ApiBookController::class, 'index']);
Route::get('/books/show/{id}', [ApiBookController::class, 'show']);
