<?php
namespace App\Http\Controllers;

use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LoanApplicationSent;

class MailController extends Controller
{
    public function mail() 
    {
        return "<h2>Hello World</h2>";
        
        // Notification::route('mail', [
        //     'barrett@example.com' => 'Barrett Blair',
        // ])->notify(new EmailNotification());
        // $user->notify(new EmailNotification());

        Mail::send("mail", function($message) {
            $message->to("rizkipuj@gmail.com", "Rizki Puji")->subject("Test Mail");
        });
        echo "Email Sent. Check your inbox.";

    }
}