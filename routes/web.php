<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Mail\SendMail;
use App\Models\Client;
use App\Notifications\HelloUser;
use App\Notifications\SendNotification;

use NotificationChannels\Telegram\Telegram;

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
$router->get('/database-notif', 'SendMailController@databasenotif');

$router->get('/send-telegram', 'SendMailController@telegramInvoice');

$router->get('/mailable', function () { 
    return new SendMail();
});

$router->get('/telegram', function () { 
    $var = new Telegram();
    $var->setToken('5871932246:AAFuheoc950VupQjP5ziC4oy164SAe8KqFc');
    $params = [
        'chat_id'                  => '5430224572',
        'text'                     => 'Assalamu\'alaikum Wr. Wb.',
        'parse_mode'               => '',
        'disable_web_page_preview' => '',
        'disable_notification'     => 'true',
        'reply_to_message_id'      => '',
        'reply_markup'             => '',
        ];
    $var->sendMessage($params);
    return "Notification Sent!";
});

