<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentMailSend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $ticket_id;
    public $status;
    public $priority;
    public $department;
    public $ticket_subject;
    public $agent_id;

    public function __construct($ticket_id, $status, $priority, $department, $ticket_subject, $agent_id)
    {
        $this->ticket_id      = $ticket_id;
        $this->status         = $status;
        $this->priority       = $priority;
        $this->department     = $department;
        $this->ticket_subject = $ticket_subject;
        $this->agent_id       = $agent_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ticket Assigne')->view('emails_send.agent_mail_send');
    }
}
