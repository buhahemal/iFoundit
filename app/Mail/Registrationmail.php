<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registrationmail extends Mailable
{
    use Queueable, SerializesModels;
    public $edata;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($edata)
    {
        //
        $this->edata = $edata;
        
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->view('Client.Verification');
    }
}
