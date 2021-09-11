<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newparteDiaria extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $equipamento = [];
    private $result = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\stdClass $user)
    {
        $this->user = $user;
        //$this->equipamento = $equipamento;
        //return $this->equipamento;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Relatório de parte diária');
        $this->to($this->user->email);
        //$this->attach(public_path('mn01-relatorio.pdf'));
        return $this->view('Mail.email', [
            'user' => $this->user
        ]);
    }
}
