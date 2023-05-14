<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    ShowTweets,
};
use App\Http\Livewire\User\UploadPhoto;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tweets', ShowTweets::class)->middleware('auth')->name('tweets.index' );
Route::get('/upload', UploadPhoto::class)->middleware('auth')->name('upload.photo.user');


Route::get('/', function () {
    return redirect('/upload');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
