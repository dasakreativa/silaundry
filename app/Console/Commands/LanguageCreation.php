<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputArgument;

class LanguageCreation extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'make:translation {trans} {--lang=}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'To make and generate translation file.';

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
   * Create the directory
   *
   * @return void
   */
  function __mkdir($path)
  {
    $lang = $this->option('lang');
    $path = base_path("resources/lang/{$lang}/{$path}");
    $dirname = dirname($path);

    if(!file_exists($dirname))
    {
      mkdir($dirname, 0777, true);
    }
  }

  /**
   * Create File
   *
   * @return void
   */
  private function __create($path)
  {
    if(File::exists($path))
    {
      $trans = $this->argument('trans');
      $this->error("The file already exists {$trans}.");
      return 0; // Break
    }

    $lang = $this->option('lang');
    $path = base_path("resources/lang/{$lang}/{$path}");
    File::put($path, "<?php \n\nreturn [];");

    $path = str_replace('/', "\\", $path);
    $this->info("File {$path} successfuly created.");
  }

  /**
   * Check the file
   *
   * @return string
   */
  private function __path($file)
  {
    $replace = str_replace('.', '/', $file);
    return "{$replace}.php";
  }

  /**
   * Execute the console command.
   *
   * @return string
   */
  public function handle()
  {
    $file = $this->argument('trans');
    $path = $this->__path($file);
    $this->__mkdir($path);
    $this->__create($path);
  }

  /**
   * Get the console command arguments.
   *
   * @return array
   */
  protected function getArguments()
  {
    return [
      ['trans', InputArgument::REQUIRED, 'The translate file.'],
    ];
  }
}
