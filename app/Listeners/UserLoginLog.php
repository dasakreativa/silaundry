<?php

namespace App\Listeners;

use App\Events\UserLoginRecord;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Browser;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserLoginLog
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  object  $event
   * @return void
   */
  public function handle(UserLoginRecord $event)
  {
    $user     = $event->user;
    $record   = $event->record;
    $request  = $event->request;

    $record->create([
      'username'    => $user->username,
      'browser'     => Browser::browserName(),
      'ip'          => $request->ipinfo->ip,
      'country'     => $request->ipinfo->country_name,
      'session_id'  => Session::getId(),
    ]);

    $user->notify(new \App\Notifications\SentNotificationLogin($user, $request));
  }
}
