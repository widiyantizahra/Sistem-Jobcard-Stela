<?php

use App\Http\Controllers\Api\GetDataAPI as ApiGetDataAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/data-api',[ApiGetDataAPI::class,'index']);
