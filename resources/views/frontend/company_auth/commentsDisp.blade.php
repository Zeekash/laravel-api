<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@foreach ($comments as $comment)
    @if ($comment->status == 1)
        <div class="display-comment" @if ($comment->parent_id != null) style="margin-left:40px;" @endif>
            <div style="font-size:15px">

                <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
                    @csrf

                    <p class="m-0 commenter-name">{{ $comment->name }}</p>
                    <p class="m-0 commenter-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y') }}
                    </p>

                </form>
            </div>
            <p class="m-0 commente">{{ $comment->body }}</p>
            <hr>
        
        </div>
    @endif
@endforeach
