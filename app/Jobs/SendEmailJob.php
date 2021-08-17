<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailDemo;
use Mail;

class SendEmailJob implements ShouldQueue
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
        // $email = new SendEmailDemo($this->contact);
        //
        // Mail::to($this->contact->email)->send($email);

        $data['contacto'] = $this->contact;

        // Envio de email al cliente
        Mail::send('emails.site.contact-confirmation', array('data' => $data), function( $message ) use ($data){
          $message->to($data['contacto']->email)->subject('Solicitud de contacto recibida | ' . config('app.company_name'));
        });
    }


    public function failed()
    {
        info('Job fallado');
    }
}
