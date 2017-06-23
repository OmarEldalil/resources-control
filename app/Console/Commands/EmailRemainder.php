<?php

namespace App\Console\Commands;

use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Console\Command;

use Mail;

class EmailRemainder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

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

        $rentals = Rental::all();


        $rentals->map(function ($rental) {

            if (!$rental->contract_end_date) return false;

            $contract_end_date = Carbon::parse($rental->contract_end_date);

            $months = round(($contract_end_date->timestamp - Carbon::now()->timestamp) /
                            (60 * 60 * 24 * 30));

            if ($months <= 2 && $months >=0) {

                Mail::send('emails.reminder', $rental->toArray() , function($message) {

                    $message->from('prince4moha@gmail.com','مؤسسة الشرق');

                    $message->to('prince4moha@gmail.com', 'Ahmed El Kady')
                        ->subject('تذكرة بيمعاد أنتهاء الأيجار');

                });

            }

        });

    }
}
