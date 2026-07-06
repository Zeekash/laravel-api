<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SponsoredPostApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $payUrl;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->payUrl = route('company.sponsored-posts.index');
    }

    public function build()
    {
        return $this->subject('Your Sponsored Blog Post Has Been Approved')
            ->view('emails.sponsored-post.approved');
    }
}