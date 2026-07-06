<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SponsoredPostResubmitAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $adminUrl;

    public function __construct(Post $post)
    {
        $this->post    = $post;
        $this->adminUrl = route('admin.sponsored-posts.show', $post->id);
    }

    public function build()
    {
        return $this->subject('Sponsored Blog Post Resubmitted — ' . $this->post->title)
            ->view('emails.sponsored-post.admin-resubmit');
    }
}
