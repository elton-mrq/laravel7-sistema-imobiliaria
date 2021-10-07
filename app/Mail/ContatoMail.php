<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContatoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $contato;
    private $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contato, $email)
    {
        $this->contato = $contato;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject("Contato do Site");
        $this->from($this->contato['email'], $this->contato['nome']);
        $this->to($this->email, 'Contato do Site');

        return $this->view('emails.mailTeste', [
            'contato' => $this->contato
        ]);
    }
}
