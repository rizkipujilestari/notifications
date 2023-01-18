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
        Mail::raw('Hi, welcome user!', function ($message) {
            $message->to("rizkipuj@gmail.com")
            ->from("admin@torche-indonesia.com")
            ->subject("TEST SEND MAIL");
          });
        echo "Email Sent. Check your inbox.";

    }

}
