<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class NewsletterSubscriber extends Eloquent
{

    protected $table = 'newsletter_subscribers';
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function sendWelcomeMail()
    {
        $data['email'] = $this->email;

        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL))
        {
          // Envio de email al admin
          Mail::send('emails.site.confirmacion-newsletter', array('data' => $data), function( $message ) use ($data){
            $message->to($data['email'])->subject('¡Bienvenido/a a '.config('app.name').'!');
          });
          return true;
        }

        return false;
    }
}
