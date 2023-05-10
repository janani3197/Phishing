<?php

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // Preview the email by building it, and just returning it to the browser
    //return new TestEmail;
    
    
    // Send the email on a queue
    Mail::to('jananiselvam15@gmail.com')->queue(new TestEmail('This is my important message'));
    
    //return view('welcome');
    // return new TestEmail
});
