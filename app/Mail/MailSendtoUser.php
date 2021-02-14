<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSendtoUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $title;
    protected $request;
    protected $admin;
    protected $chip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $admin, $chip, $title)
    {
        //バック申請を出したときのメール送信
        $this->title = $title;
        $this->admin = $admin;
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
        return $this->view('email.chipsendtoUser')
            ->subject($this->title)
            ->with([
                'request' => $this->request,
                'admin' => $this->admin,
                'chip' => $this->chip,
            ]);
    }
}
