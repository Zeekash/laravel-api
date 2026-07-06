<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class PublishScheduledPosts extends Command
{
    protected $signature = 'posts:publish-scheduled';
    protected $description = 'Publish scheduled blog posts when their publish date arrives';

    public function handle()
    {
        $posts = Post::scheduledForPublish()->where('is_published', false)->get();

        foreach ($posts as $post) {
            $post->update(['is_published' => true]);
            $this->info("Published: {$post->title}");
        }

        $this->info('All scheduled posts published successfully.');
    }
}
