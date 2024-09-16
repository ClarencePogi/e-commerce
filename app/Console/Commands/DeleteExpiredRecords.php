<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteExpiredRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'records:delete-expired';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete sale product that are past their expiration date';


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
        YourModel::where('date_end', '<=', now())->delete();
        $this->info('Expired sale deleted successfully.');
    }
}
