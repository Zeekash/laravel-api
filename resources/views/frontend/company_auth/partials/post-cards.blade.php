@foreach ($posts as $post)
    <div class="col-lg-4">
        <a href="{{ route('posts.show', $post->slug) }}" class="article-link">
            <div class="blog-card">
                <div class="card-image">
                    <img loading="lazy" src="{{ asset('public/posts/image/' . $post->image) }}"
                        alt="{{ $post->image }}">
                </div>
                <div class="card-content">
                    <div class="small_card">
                        <div class="category">{{ $post->postCategory->name }}</div>
                        <h2 class="title">{{ $post->title }}</h2>
                        <div class="meta">
                            by <span class="author">{{ $post->admin->name }}</span>
                            •
                            <span
                                class="date">{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M d, Y') }}</span>
                        </div>
                    </div>
                    <button class="read-more ">Read The Article</button>
                </div>
            </div>
        </a>
    </div>
@endforeach
