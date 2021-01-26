<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'limitexpire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire users auto every minute';

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
        $limitexpire = User::where('expire',0)->get();
        foreach ($limitexpire as $userlimit) {
            $userlimit -> update(['expire' => 1]);
        }
    }
}
 