<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:segarkan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menyegarkan database yang kita punya';

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
     * @return mixed
     */
    public function handle()
    {
        // action
        // di migrate baru di seed / migrate:refresh --seed sama saja seperti itu
        $this->call('migrate:fresh');

        $this->call('db:seed');

        $this->info('Semua database telah siap digunakan');
    }
}
