<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sns', function (\Illuminate\Http\Request $request) {
    Log::info('Route is called...');
    $message = json_decode($request->getContent());

    if ($message->Type == 'SubscriptionConfirmation')
    {
        // Confirm the subscription
        $url = $message->SubscribeURL;
        Http::get($url);
    }
    else
    {
        // Notification of message delivery
        $data = json_decode($message->Message);
        $data->Headers
    }
    
    
    return response()->json(['message' => 'Notification received'], 200);
})->name('emailpage');