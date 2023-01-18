<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

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

}
