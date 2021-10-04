<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\Admin\ContactConfirmation as AdminConfirmationEmail;
use App\Mail\Site\ContactConfirmation as ClientConfirmationEmail;

class SendContactConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contact;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $admin_email = new AdminConfirmationEmail($this->contact);
        Mail::to(config('app.notifications_email'))->send($admin_email);

        $client_email = new ClientConfirmationEmail($this->contact);
        Mail::to($this->contact->email)->send($client_email);
    }
}
