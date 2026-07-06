<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsoredPostPaymentConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $isAdmin;

    public function __construct(Post $post, bool $isAdmin = false)
    {
        $this->post    = $post;
        $this->isAdmin = $isAdmin;
    }

    public function build()
    {
        $subject = $this->isAdmin
            ? 'Payment Received — Sponsored Post: ' . $this->post->title
            : 'Payment Confirmed — Your Sponsored Post is Now Live!';

        return $this->subject($subject)
            ->view('emails.sponsored-post.payment-confirmation');
    }
}
