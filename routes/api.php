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

Route::get('/health', [App\Http\Controllers\One::class, 'show']); //1

Route::get('/exam-room/{id}', [App\Http\Controllers\Two::class, 'show']); //2

Route::post('/wifi-login', [App\Http\Controllers\Three::class, 'store']);   //3

Route::get('/library/book/{isbn}', [App\Http\Controllers\Four::class, 'show']);  //4


Route::post('/canteen/order', [App\Http\Controllers\Five::class, 'store']); //5

Route::post('/emergency', [App\Http\Controllers\Seven::class, 'store']); //7

Route::get('/notices', [App\Http\Controllers\Eight::class, 'show']); //8

Route::post('/students', [App\Http\Controllers\Ten::class, 'create']); //10.1
Route::get('/students/{id}', [App\Http\Controllers\Ten::class, 'read']);  //10.2
Route::put('/students/{id}', [App\Http\Controllers\Ten::class, 'update']); //10.3
Route::delete('/students/{id}', [App\Http\Controllers\Ten::class, 'delete']);  //10.4
