<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageRecieved extends Mailable
{
    use Queueable, SerializesModels;
    
    public $json_nuevo_cliente;
    public $subject = 'REWEAR.COM ENVIO MENSAJE';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($json_nuevo_cliente)
    {
        //
        $this->json_nuevo_cliente = $json_nuevo_cliente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.message-received');
    }
}
