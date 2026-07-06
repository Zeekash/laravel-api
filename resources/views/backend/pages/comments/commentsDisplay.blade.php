

 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div style="font-size:15px">
           
            <form action="{{route('admin.comments.update', $comment->id)}}" method="POST">
                @csrf
                <strong>{{ $comment->name }}</strong> 
        <div class="float-right">
            <strong>Approval</strong>
                <input  type="hidden" name="status" value="0">
                <input  type="checkbox" id="status" name="status" onChange='submit();' value="1" @if(old('status',$comment->status)=="1") checked @endif>
            </div>
       

            </form>
        </div>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('admin.comments.store') }}">
           
            @csrf
            <div class="form-group">

                <input type="text" name="name" class="form-control" placeholder="Name" /><br>
                <textarea type="text" name="body" class="form-control" ></textarea>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('backend.pages.posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
<script>
 
    onChange="this.form.submit()"
</script>



@endforeach