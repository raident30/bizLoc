<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\PlacesFilterController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\WeatherController;



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

Route::resource('places', PlacesController::class)
    ->only(['index','store','show','update','destroy'
]);

Route::resource('places_filters', PlacesFilterController::class)
    ->only(['index','store','show','update','destroy'
]);

Route::resource('cities', CitiesController::class)
    ->only(['index','store','show','update','destroy'
]);

Route::resource('weather', WeatherController::class)
    ->only(['index','store','show','update','destroy'
]);


