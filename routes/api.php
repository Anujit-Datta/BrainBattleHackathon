<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/a', function () {
    return [
        "name" => "Brain Battle Hackathon Api",
    ];
});

Route::get('/health', [App\Http\Controllers\One::class, 'show']);

Route::get('/exam-room/{id}', [App\Http\Controllers\Two::class, 'show']);

Route::post('/wifi-login', [App\Http\Controllers\Three::class, 'store']);

Route::get('/library/book/{isbn}', [App\Http\Controllers\Four::class, 'show']);

Route::post('/canteen/order', [App\Http\Controllers\Five::class, 'store']);
