<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class resetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $msg;
    public $reseturl;

    public function __construct($msg, $reseturl)
    {
        $this->msg = $msg;
        $this->reseturl = $reseturl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // retornar vista para generar el emil de reseteo de contraseña
    public function build()
    {
        return $this->view('login.mail');
    }
}
