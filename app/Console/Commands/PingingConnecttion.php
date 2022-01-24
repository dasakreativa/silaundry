<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PingingConnecttion extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'ping {web} {--port=}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'To check your connection';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle()
  {
    $ip       = $this->argument('web');
    $port     = $this->option('port') ? $this->option('port') : 80;
    $url      = $ip . ':' . $port;
    $ch       = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data     = curl_exec($ch);
    $health   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if($health == 200 || $health == 300 || $health == 301 || $health == 302)
    {
      $this->info("Your connection with {$ip} is stable with status {$health}");
    } elseif($health == 0) {
      $this->error("The website are currently down or DNS are not found. Recheck your domain or IP Addreses.");
    } else {
      $this->error("Your connection with {$ip} isn't stable with status code {$health}");
    }
  }
}
