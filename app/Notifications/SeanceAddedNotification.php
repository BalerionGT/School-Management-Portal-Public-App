<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class SeanceAddedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param string $message
     */
    public function __construct(private string $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable)
    {
        return [
            'message' => $this->message
        ];
    }
    /**
     * Get the database representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message
        ];
    }
}



