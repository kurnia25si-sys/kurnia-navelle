<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BalasanUlasanNotification extends Notification
{
    use Queueable;

    public $namaProduk;
    public $balasan;
    public $namaAdmin;

    public function __construct($namaProduk, $balasan, $namaAdmin)
    {
        $this->namaProduk = $namaProduk;
        $this->balasan = $balasan;
        $this->namaAdmin = $namaAdmin;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Balasan Ulasan Produk - Navelle')
            ->greeting('Halo, Pelanggan Navelle!')
            ->line('Admin telah membalas ulasan produk yang kamu berikan.')
            ->line('Produk: ' . $this->namaProduk)
            ->line('Balasan Admin: ' . $this->balasan)
            ->line('Dibalas oleh: ' . $this->namaAdmin)
            ->line('Terima kasih telah memberikan ulasan di Navelle.');
    }
}
