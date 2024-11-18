<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
    
    public function build()
    {
        return $this->subject('Verifique seu e-mail')
            ->view('emails.verify-email')
            ->with(['token' => $this->user->email_verification_token]);
    }
    
}