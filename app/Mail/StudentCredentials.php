<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class StudentCredentials extends Mailable
{
    public $student;
    public $password;

    public function __construct(User $student, $password)
    {
        $this->student = $student;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Your Login Credentials')
            ->view('emails.student_credentials');
    }
}
