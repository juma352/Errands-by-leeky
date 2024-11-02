<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ErrandCompletedNotification extends Notification
{
    use Queueable;

    protected $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail']; // You can also use other channels like database, broadcast, etc.
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Errand Completed')
            ->line('Your errand application has been marked as complete.')
            ->action('View Application', url('/my-errand-applications/'.$this->application->id))
            ->line('Thank you for using our application!');
    }
}