<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'app:make-repo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository and its interface';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name') . 'Repository';

        if (File::exists(app_path("Repositories/{$name}.php")) || File::exists(app_path("Repositories/{$name}Interface.php"))) {
            $this->error("🚫 Whoa, Samir cadet! Looks like '{$name}' or '{$name}Interface' is already soaring. Choose another name to lift off!");
            return;
        }

        $this->info("🚀 Preparing for Samir lift-off! Initiating repository and interface creation...");

        $this->createInterface($name);
        $this->info("🌈 Sky's the limit! {$name}Interface.php is now airborne!");

        $this->createImplementation($name);
        $this->info("🌠 Shooting star! {$name}.php is now in orbit!");

        $this->info("🛰️ Samir mission complete! Your repository and interface are ready to explore new heights!");
    }

    protected function createInterface($name)
    {
        $stub = File::get(base_path('stubs/repository.interface.stub'));
        $stub = str_replace('{{name}}', $name, $stub);

        if (!File::exists(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'));
        }

        File::put(app_path("Repositories/{$name}Interface.php"), $stub);
    }

    protected function createImplementation($name)
    {
        $stub = File::get(base_path('stubs/repository.stub'));
        $stub = str_replace('{{name}}', $name, $stub);

        File::put(app_path("Repositories/{$name}.php"), $stub);
    }
}
