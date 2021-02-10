<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'New template from client';
        if (!isset($this->data['file'])) $subject = 'New message from client';

        $view = $this->view('mail.client-templates')
            ->with($this->data)
            ->subject($subject);

        if (isset($this->data['file'])) {
            $view = $view->attach($this->data['file']);
        }

        return $view;
    }
}
