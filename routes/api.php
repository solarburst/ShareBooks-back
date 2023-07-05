<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FavouriteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sanctum/csrf-cookie', function() {
    return response()->json([
        'csrfToken' => csrf_token(),
    ]);
});

Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'login']);


Route::apiResource('/books', BookController::class);
Route::apiResource('/favourites', FavouriteController::class);

Route::post('/favourites', [FavouriteController::class, 'store']);


Route::post('/recommend', [FavouriteController::class, 'getRecommendationsForId']);