<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactNotification extends Notification
{
    use Queueable;
    protected $contact;

    /**
     * Create a new notification instance.
     */
    public function __construct(Contact $contact)
    {
        //
        $this->contact=$contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject('Nouvelle réservation de voiture')
        ->greeting('Bonjour,')
        ->line('Vous avez recu nun nouveau message.')
        ->line('De la part de : ' . $this->contact->nom)
        ->line('Email : ' . $this->contact->email)
        ->line('Telephone : ' . $this->contact->telephone)
        ->line('Sujet:  ' . $this->contact->sujet)
        ->line('Message : ' . $this->contact->message)
        ->action('Voir la réservation', url('/admin/contact/'))
        ->line('Merci d\'utiliser notre application !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
