<?php

use App\Http\Controllers\Api\BuzzerController;
use App\Http\Controllers\Api\GasSensorController;
use App\Http\Controllers\Api\HumiditySensorController;
use App\Http\Controllers\Api\LedBlueController;
use App\Http\Controllers\Api\LedGreenController;
use App\Http\Controllers\Api\LedRedController;
use App\Http\Controllers\Api\RainSensorController;
use App\Http\Controllers\Api\TemperatureSensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function () {

    // sensor
    Route::resource('sensors/temperature', TemperatureSensorController::class)
        ->names('sensors.temperature');
    Route::resource('sensors/humidity', HumiditySensorController::class)
        ->names('sensors.humidity');
    Route::resource('sensors/gas', GasSensorController::class)
        ->names('sensors.gas');
    Route::resource('sensors/rain', RainSensorController::class)
        ->names('sensors.rain');


    // control
    Route::resource('control/ledred', LedRedController::class)
        ->names('control.ledred');
    Route::resource('control/ledgreen', LedGreenController::class)
        ->names('control.ledgreen');
    Route::resource('control/ledblue', LedBlueController::class)
        ->names('control.ledblue');
    Route::resource('control/buzzer', BuzzerController::class)
        ->names('control.buzzer');
});
