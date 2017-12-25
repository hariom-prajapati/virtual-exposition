<?php

namespace App\Console\Commands;

use App\Visit;
use App\Stand;
use App\BookingCompany;
use App\Mail\Visitors;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email Visits to company email address';

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
        $this->info('Getting information...');

        // get all the visits for all stands
        $visits = Visit::with('stand')->get();

        foreach($visits as $v)
        {
            if($v->stand->event->end_date > now())
            {
                $email = $v->stand->booking_company->email;
                $visitors = $v->visits;
                $stand = $v->stand;
                $event = $v->stand->event;

                // send the stats email to company email addresses
                \Mail::to($email)->send(
                    new Visitors( $email, $visitors, $stand, $event )
                );
            }
        }

        $this->info('Emails Sent!');
    }
}
