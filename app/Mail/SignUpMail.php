<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignUpMail extends Mailable
{
    use Queueable, SerializesModels;
      private $nom;
      private $prenom;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nom ,$renom)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.inscription')->with("nom",$nom)->with('prenom',$prenom);
    }
}
