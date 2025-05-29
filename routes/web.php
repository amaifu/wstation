<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/memes', function () {
    return view('memes');

});
Route::get('/anime', function () {
    return view('anime');
});