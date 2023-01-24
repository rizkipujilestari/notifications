<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use NotificationChannels\Telegram\TelegramMessage;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->subject('TEST SEND EMAIL')
        //             ->view('vendor.mail');

        $html = "<h1> Assalamu'alaikum </h1> <b>Kamu apa kabar?</b>";
        return $this->html($html, function ($message) {
            $message->to('someone-likeyou@gmail.com')
            ->subject('TEST EMAIL')
            ->from('rizkipuj@gmail.com');
        });
    }
}
