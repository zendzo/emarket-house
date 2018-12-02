<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentNotification extends Notification
{
    use Queueable;

    protected $angsuran;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($angsuran, $user)
    {
        $this->user = $user;

        $this->angsuran = $angsuran;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject('Taggihan Angsuran : '.$this->angsuran->rumah->perumahan->name." Blok ".$this->angsuran->rumah->block."/".$this->angsuran->rumah->number)
                    ->line("Hai ".$this->user->fullName)
                    ->line("Tagihan Pembayran Angsuran")
                    ->line("Untuk : ".$this->angsuran->rumah->perumahan->name." Blok ".$this->angsuran->rumah->block."/".$this->angsuran->rumah->number)
                    ->line("Tanggal Jatuh Tempo : ".$this->angsuran->tanggal_tempo->format('D, d m Y'))
                    ->line("Sebesar : ".$this->angsuran->total)
                    ->line("Mohon Segera Lakukan Pembayaran Sebelum Tanggal Jatuh Tempo.")
                    ->line("Abaikan Pesan Ini Jika Sudah Melakukan Transfer Pembayaran.")
                    ->action('Upload Pembayaran Sekarang', url('/user/rumah/'.$this->angsuran->rumah->id))
                    ->line('Terimakasih');
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
            //
        ];
    }
}
