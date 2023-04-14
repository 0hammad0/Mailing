<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sendMail', [MailController::class, 'mailer'])->name('send.mail');

Route::get('job', function(){
    if(Artisan::call('queue:work'))
        return redirect()->back();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
