<?php

namespace App\Notifications;

use App\Models\Backend\Career;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CareerNotifications extends Notification
{
    use Queueable;

    private $career;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Career $career)
    {
        //
        $this->career = $career;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            //
            'career_id' => $this->career->id,
            'full_name' => $this->career->full_name,
            'email' => $this->career->email,
            'message' => $this->career->message,
        ];
    }
}
