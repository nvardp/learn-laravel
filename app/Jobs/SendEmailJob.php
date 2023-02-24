<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use Mail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{

        $email = new SendEmailTest();
        Mail::to($this->details['email'])->send($email);
        }
        catch (Exception  $ex)
        {
            log($ex);
        }

//        $email_data = array(
//            'name' =>"banana...",
//            'email' => "nvardp21@gmail.com",
//        );
//       Mail::send('mails.welcome', $email_data, function ($message) use ($email_data) {
//            $message->to($this->details['email'])
//                ->subject('Welcome to MyNotePaper')
//                ->from('info@mynotepaper.com', 'MyNotePaper');
//        });
    }
}
