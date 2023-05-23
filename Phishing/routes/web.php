<?php

use App\Http\Controllers\MailingController;
use App\Http\Controllers\VictimdetailsController;
use App\Http\Controllers\UserController;
use App\Mail\TestEmail;
use App\Models\Mailing;
use Illuminate\Support\Facades\Log;
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

// Route::get('/', function () {
//     return redirect()->route('mailings.create');
// })->can('create', Mailing::class);

Route::get('/', function () {
    return redirect()->route('mailings.create');
});

Route::resource('mailings', MailingController::class);

// https://example.com/testform/4327hjs4532423
Route::get('/testform/{mailing:hash}', function (Mailing $mailing) {

    

    return view('frontend.mailing.testform', compact('mailing'));
})->name('please-give-all-routes-a-name');

Route::get('/event', function () {
    return view('frontend.mailing.event');
});

Route::get('/users', [UserController::class, 'getUsersData']);
// Route::get('/email-sent', function () {
//     return view('frontend.thanks');
// })->name('email-sent');



/**
 * Utility routes that are helpful for use in testing!
 */
// if(app()->environment('local')) {
//     Route::get('/users/{user}/cloak', [UserController::class, 'cloak'])->name('cloak');
Route::post('/testform', [VictimdetailsController::class, 'index'])->name('testform');



// Route::post('/sendemail', function() {
//     Mail::to('nabeesh.ahamed@gmail.com')->queue(new TestEmail('Some internal message'));
//     return app(MailingController::class)->index();
// })->name('sendemail');

// Mail::to('nabeesh.ahamed@gmail.com')->queue(new TestEmail('Some internal message'));



