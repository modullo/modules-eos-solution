<?php

namespace Modullo\ModulesEosSolution\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolutionStatusMail extends Mailable
{
    public $message;
    public $firstname;
    public $status;
    public function __construct($message,$firstname,$status)
    {
        $this->message = $message;
        $this->firstname = $firstname;
        $this->status = $status;
    }

    public function build()
    {
        return $this
            ->subject("Solution $this->status")
            ->markdown('modules-eos-solution::emails.solution');
    }

}
