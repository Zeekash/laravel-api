<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsoredPostSubmitUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        return $this->subject('Sponsored Blog Post Request Received — ' . $this->post->title)
            ->view('emails.sponsored-post.user-submit');
    }
}
