<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\Client;
use App\Notifications\HelloUser;
use App\Notifications\InvoicePaid;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

use App\User;
use Illuminate\Notifications\Notifiable;

class SendMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $html = "<h1> Assalamu'alaikum </h1> <b>Kamu apa kabar?</b>";
        Mail::html($html, function ($message) {
            $message->to('someone-likeyou@gmail.com')
            ->subject('TEST EMAIL')
            ->from('rizkipuj@gmail.com');
        });
        
        // $content = "Assalamu'alaikum Wr. Wb.";
        // Mail::raw($content, function ($message) {
        //     $message->to("rizkipuj@gmail.com")
        //     ->from("admin@torche-indonesia.com")
        //     ->subject("TEST SEND MAIL");
        //   });
        echo "Email Sent. Check your inbox.";
    }
    
    public function emailnotif()
    {
        try {
            Notification::route('mail', 'rizkipuj@gmail.com')->notify(new SendNotification());
            return "Berhasil kirim notif!";

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    
    public function databasenotif()
    {
        try {
            // $user = Client::first();
            // dd($user->notifications);
        
            $user = Client::first();
        
            $project = [
                'greeting' => 'Hi '.$user->fullname.',',
                'body' => 'This is the project assigned to you.',
                'thanks' => 'Thank you this is from codeanddeploy.com',
                'actionText' => 'View Project',
                'actionURL' => url('/'),
                'id' => 57
            ];
            
            Notification::send($user, new HelloUser($project));
            
            echo ('Notification sent!');
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    
    public function telegramnotif()
    {
        try {
            $user = Client::first();
            $user->notify(new SendNotification());
            
            echo "Telegram Sent. Check your inbox.";
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function telegramInvoice()
    {
        try {
            $user = Client::first();
            $user->notify(new InvoicePaid());
            
            echo "Telegram Sent. Check your inbox.";
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

}
