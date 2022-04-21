<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAppointment extends Notification
{
    use Queueable;

    protected $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        $channel = ["database"/* , "mail" */];
        return $channel;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        $user_name = User::findOrFail($this->appointment->user_id)->name;
        return [
            "id"    => $this->appointment->id,
            "title" => __("notification.NewAppointment"),
            "body"  => __("notification.content", [
                "nameOfUser" => $user_name,
            ]),
            "icon"  => asset("images/users_pic/appointment.png"),
            "url"   => route("doctor.show.appointment", $this->appointment->id),
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
