<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/check-word', [WordController::class, 'checkWord']);


route::get('words',function () {
    return view ('words');
});
