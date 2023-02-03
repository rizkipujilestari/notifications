<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\Telegram;

class InvoicePaid extends Notification
{
    public function via($notifiable)
    {
        return ["mail", "telegram"];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Order Status')
            ->from('sender@example.com', 'Sender')
            ->greeting('Hello!')
            ->line('Your order status has been updated')
            ->action('Check it out', url('/'))
            ->line('Best regards!');
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            // Optional recipient user id.
            ->to('5430224572')
            // Markdown supported.
            ->content("Hello there!")
            ->line("Your invoice has been *PAID*")
            ->line("Thank you!");
    }
}
