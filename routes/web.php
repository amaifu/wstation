<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\VideoController;
use App\Mail\VerificationCode;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/videos', function () {
    return view('videos');

});
Route::get('/anime', function () {
    return view('anime');
});

Route::get('/getcsrftoken', function () {
    return csrf_token();
});

// Get SignUp Token
// Route::get('/getsignuptoken', function () {
//     Mail::to('catkompay@gmail.com')->send(new VerificationCode());
// });

// AUTH
Route::post('/getregistertoken', [UserController::class, 'getRegisterToken']);
Route::post('/getsignuptoken', [MailController::class, 'sendMail']);
Route::post('/savesignuptoken', [UserController::class, 'saveRegisterToken']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

// Video Upload
Route::post('/upload', [VideoController::class, 'videoUpload']);

// Get Videos
Route::get('/getvideos', [VideoController::class, 'getVideos']);

// Play Video
Route::get('/play/{id}', [VideoController::class, 'playVideo']);