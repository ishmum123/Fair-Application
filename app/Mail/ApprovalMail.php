<?php

namespace App\Mail;

use App\MailClass\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use function Symfony\Component\Debug\Tests\testHeader;

class ApprovalMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $custom_email_body = null;
    protected $custome_email_attach = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($custom_email_body, $custome_email_attach)
    {
        $this->custom_email_body = $custom_email_body;
        $this->custome_email_attach = $custome_email_attach;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->custome_email_attach != null){
            return $this->from('festival19.bd@gmail.com')->view('mail.approval')
                ->subject('Application for fair is Approved')
                ->attach($this->custome_email_attach)
                ->with([
                    'custom_email_body' => $this->custom_email_body,
                ]);
        }
        else{
            return $this->from('festival19.bd@gmail.com')->view('mail.approval')
                ->subject('Application for fair is Approved')
                ->with([
                    'custom_email_body' => $this->custom_email_body,
                ]);
        }

    }
}
