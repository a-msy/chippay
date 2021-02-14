<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSendtoAdmin extends Mailable
{
    use Queueable, SerializesModels;
    protected $title;
    protected $request;
    protected $user;
    protected $chip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request,$user,$chip,$title)
    {
        //バック申請を出したときのメール送信
        $this->title = $title;
        $this->user = $user;
        $this->chip = $chip;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.chipsend')
            ->subject($this->title)
            ->with([
                'request' => $this->request,
                'user' => $this->user,
                'chip'=>$this->chip,
            ]);
    }
}
