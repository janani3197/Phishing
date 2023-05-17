<?php

use App\Http\Controllers\MailingController;
use App\Http\Controllers\VictimdetailsController;
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
})->name('emailpage');;

Route::get('/testform', function () {
    return view('Frontend.testform');
});

Route::get('/event', function () {
    return view('Frontend.event');
});

Route::get('/email-sent', function () {
    return view('Frontend.thanks');
})->name('email-sent');



Route::post('/sendemail', [MailingController::class, 'index'])->name('sendemail');
Route::post('/testform', [VictimdetailsController::class, 'index'])->name('testform');


// Route::post('/sendemail', function() {
//     Mail::to('nabeesh.ahamed@gmail.com')->queue(new TestEmail('Some internal message'));
//     return app(MailingController::class)->index();
// })->name('sendemail');

// Mail::to('nabeesh.ahamed@gmail.com')->queue(new TestEmail('Some internal message'));



