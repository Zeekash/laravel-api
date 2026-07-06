<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsoredPostRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $dashboardUrl;

    public function __construct(Post $post)
    {
        $this->post         = $post;
        $this->dashboardUrl = route('company.sponsored-posts.index');
    }

    public function build()
    {
        return $this->subject('Your Sponsored Post Request Has Been Rejected')
            ->view('emails.sponsored-post.rejected');
    }
}
