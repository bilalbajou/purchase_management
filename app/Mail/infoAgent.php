<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class infoAgent extends Mailable
{
    use Queueable, SerializesModels;
    public  $user;
    public $pass;
     /** 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$pass)
    {
        $this->user=$user;
        $this->pass=$pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@gmail.com')
                    ->subject('Information du compte')
                ->view('mail.infoAgent');
    }
}
