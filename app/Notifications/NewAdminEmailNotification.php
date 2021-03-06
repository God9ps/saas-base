<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAdminEmailNotification extends Notification
{
    use Queueable;

    private $subdomain;
    private $password;
    private $email;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subdomain, $email, $password)
    {
        $this->password  = $password;
        $this->subdomain = $subdomain;
        $this->email     = $email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting(trans('cruds.user.email.greeting_new_user'))
            ->line(trans('cruds.user.email.credentials_message'))
            ->line('Email : ' . $this->email)
            ->line('Password : ' . $this->password)
            ->action(trans('cruds.user.email.access_app'), 'http://'.$this->subdomain. '.'.env('APP_DOMAIN').'/login')
            ->line(trans('cruds.user.email.thanks'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
