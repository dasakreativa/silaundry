<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SentNotificationLogin extends Notification
{
  use Queueable;

  private $user, $request;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($user, $request)
  {
    $this->user     = $user;
    $this->request  = $request;
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
    ->from('admin@dasa.web.id', config('app.name'))
    ->greeting("Halo {$this->user->fullname}")
    ->line("Kami mendapati akun anda telah diakses di komputer atau perangkat lain. Dengan rincian sebagai berikut")
    ->line("IP Address : {$this->request->ipinfo->ip}")
    ->line("Negara : {$this->request->ipinfo->country_name}");
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
