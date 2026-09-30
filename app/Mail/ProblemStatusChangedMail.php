<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProblemStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nsekodinar@gmail.com', 'Mapa Novi Sad')
                    ->markdown('pages.email.problem-status-changed', ['status' => $this->status])
                    ->subject('Problem status changed.');
    }
}
