<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use App\Models\User;


class TeacherCredentials extends Mailable
{
    public $teacher;
    public $password;

    public function __construct(User $teacher, $password)
    {
        $this->teacher = $teacher;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Your Login Credentials')
            ->view('emails.teacher_credentials');
    }
}
