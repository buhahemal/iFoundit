<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels; 

class Claimsentmail extends Mailable
{
    use Queueable, SerializesModels;
    public $cdata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cdata)
    {
        //
        $this->cdata=$cdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Client.Claimsentmail');
    }
}
