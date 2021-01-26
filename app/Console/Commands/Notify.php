<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sending emails to users every day auto';

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
       $mails = User::select('email')->get();
       $data = 'please do your work';
       foreach ($mails as $usermail) {
           Mail::To($usermail)->send(new NotifyEmail($data));

       }  
    }
}
