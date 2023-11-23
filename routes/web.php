<?php

//use App\Mail\WelcomeMail;
//use Illuminate\Support\Facades\App;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

if(\Illuminate\Support\Facades\App::isLocal())
{
    Route::get('/playground', function()
    {
        $user = User::factory()->make();

        Mail::to($user)->send(new \App\Mail\WelcomeMail($user));

        return null;
    });
}
