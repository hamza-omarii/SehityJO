<?php

namespace App\Notifications;

use App\Models\Doctor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDoctorRegistered extends Notification
{
    use Queueable;

    protected $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
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
        return [
            "title" => __("notification.newDoctorRegistered"),
            "body"  => __("notification.body", [
                "nameOfDoctor" => $this->doctor->name,
            ]),

            "icon"  => $this->doctor->image_url,
            "url"   => route('admin.show.doctor.details', $this->doctor->id),
        ];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
