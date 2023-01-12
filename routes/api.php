<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookControllerWithQueue;
use App\Http\Controllers\API\BookControllerWithoutQueue;

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

// Route Without Queue
Route::resource("books-without-queue", BookControllerWithoutQueue::class)->except(["show", "update", "delete"]);

// Route With Queue
Route::resource("books-with-queue", BookControllerWithQueue::class)->except(["show", "update", "delete"]);