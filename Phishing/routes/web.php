<?php

use App\Http\Controllers\MailingController;
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
    return view('Frontend.index');
});

Route::post('/sendemail', [MailingController::class, 'index'])->name('sendemail');

// Route::post('/sendemail', function() {
//     Mail::to('nabeesh.ahamed@gmail.com')->queue(new TestEmail('Some internal message'));
//     return app(MailingController::class)->index();
// })->name('sendemail');

// Mail::to('nabeesh.ahamed@gmail.com')->queue(new TestEmail('Some internal message'));



