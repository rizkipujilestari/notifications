<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Mail\SendMail;
use App\Models\Client;
use App\Notifications\HelloUser;
use App\Notifications\SendNotification;
use App\Notifications\TelegramNotification;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/sendmail', 'SendMailController@index');
$router->get('/invoice', 'SendMailController@invoice');

$router->get('/telegram-notif', 'SendMailController@telegramnotif');
$router->get('/email-notif', 'SendMailController@emailnotif');


$router->get('/mailable', function () { 
    return new SendMail();
});

