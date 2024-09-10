<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Reservation;

class ReservationNotification extends Notification
{
    use Queueable;

    protected $reservation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Vous pouvez aussi ajouter d'autres canaux comme 'slack' ou 'broadcast' si nécessaire
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
                    ->subject('Nouvelle réservation de voiture')
                    ->greeting('Bonjour,')
                    ->line('Une nouvelle réservation de voiture a été effectuée.')
                    ->line('Voiture : ' . $this->reservation->car->libelle)
                    ->line('Dates : du ' . $this->reservation->start_date . ' au ' . $this->reservation->end_date)
                    ->line('Prix total : ' . $this->reservation->total_price . ' €')
                    ->action('Voir la réservation', url('/admin/reservations/' . $this->reservation->id))
                    ->line('Merci d\'utiliser notre application !');
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

        ];
    }
}
