<?php

use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Middleware\AddCustomHeaders;
use App\Http\Middleware\jay;
use App\Http\Controllers\Api\RiderController;
use App\Http\Controllers\ImageController;

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
Route::post('/register', [RiderController::class, 'register']);
Route::get('/rider_details', [RiderController::class, 'details']);
Route::get('/data', [RiderController::class, 'helper']);
Route::get('/storage', [RiderController::class, 'filestroge']);
Route::post('/url', [RiderController::class, 'url']);
Route::get('/modelbinding/{id}', [RiderController::class, 'modelbinding']);
Route::get('/exceptionhandler/{id}', [RiderController::class, 'exceptionhandler']);
Route::post('store', [RiderController::class, 'store']);

Route::get('/store', [RiderController::class, 'show']);
Route::get('/data', [RiderController::class, 'collection']);
//Route::match(['get', 'post'], '/data',[RiderController::class,'collection']);
