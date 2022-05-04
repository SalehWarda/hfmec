<?php

namespace App\Notifications;

use App\Models\Backend\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notifications extends Notification
{
    use Queueable;
    private $mail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Mail $mail)
    {
        //
        $this->mail = $mail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase ($notifiable)
    {
        return [
            //
            'mail_id' => $this->mail->id,
            'full_name' => $this->mail->full_name,
            'email' => $this->mail->email,
            'mobile' => $this->mail->mobile,
            'subject' => $this->mail->subject,
            'message' => $this->mail->message,
        ];
    }
}
