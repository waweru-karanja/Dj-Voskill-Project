<?php

namespace App\Notifications;

use App\Models\Bookings;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Newbookingrecieved extends Notification
{
    use Queueable;

    public $bookingstatus;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bookingstatus)
    {
        $this->bookingstatus = $bookingstatus;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello there sir/madam')
            ->subject('New Booking by' .$this->bookingstatus->full_name)
            ->line('We have received a new Booking and approved it to you to request payment from the client' . $this->bookingstatus->email)
            ->action('Review This Booking', route('changestatus', $this->bookingstatus->id));
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'bookingstatus'=>$this->bookingstatus
        ];
    }
}
