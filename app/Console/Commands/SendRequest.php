<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Mail;

class SendRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:sendRequest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        Mail::send('emails.test_cron' , [] ,
            function ($message)  {

                $message->from('prince4moha@yahoo.com' , 'mohamed prince');

                $message->to('prince4moha@gmail.com' , 'HR.Manager')->subject('طلب أجازة...');

            });

    }
}
