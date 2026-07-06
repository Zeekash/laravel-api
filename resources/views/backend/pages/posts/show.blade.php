<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    label {
        font-size: 20px !important
    }

    body {
        background: rgb(250, 250, 250);
    }

    /* #content h1 {
        font-size: 24px;
        margin-top: 20px;
    } */

    #table-of-contents .heading-level-2 {
        padding-left: 0%;
       
    }

    #table-of-contents .heading-level-3 {
        padding-left: 20px;
        
    }

    #table-of-contents .heading-level-4 {
        padding-left: 35px;
     
    }

    #table-of-contents .heading-level-5 {
        padding-left: 45px;
    }

    /* CSS for table of contents */
    #table-of-contents {
        /* position: fixed; */
        top: 20px;
        right: 20px;
        background-color: #f9f9f9;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* #table-of-contents ul {
        list-style: none;
        padding: 0;
    } */

    #table-of-contents li {
        margin-bottom: 5px;
    }

    #table-of-contents a {
        text-decoration: none;
        color: #333;
        /* Add indentation based on heading level */
        display: block;
        margin-left: 10px;
        /* You can adjust the indentation here */
    }

    #table-of-contents a:hover {
        color: blue;
    }
</style>

<!-- page title area end -->
<div class="main-content-inner">
    <div class="row"></div>
    <div class="col-lg-12 col-ml-12">
        <div class="row">
            <!-- Textual inputs start -->
            <div class="col-12 mt-5">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary float-right "> Back</a>
                <h4 class="header-title">Post - Show</h4>
                <div id="table-of-contents"></div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="card-head">
                            <h2>Seo Tags</h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Meta Title
                                        </strong>
                                    </label>
                                    <div>{{ $post->meta_title }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Meta Description
                                        </strong>
                                    </label>
                                    <div>{{ $post->meta_description }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Meta Keywords
                                        </strong>
                                    </label>
                                    <div>{{ $post->meta_keywords }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="card-head">
                            <h2>Post</h2>
                        </div>
                        <div class="row">
                            <div class=" col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Feature Image</label>
                                    <div>
                                        <img src="{{ asset('public/posts/image/'. $post->image) }}" alt="" width="30%">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Status
                                        </strong>
                                    </label>
                                    @if ($post->is_published == 1)
                                        <div>Published</div>
                                    @else
                                        <div>Draft</div>
                                    @endif

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Title
                                        </strong>
                                    </label>
                                    <div>{{ $post->title }}</div>

                                </div>
                            </div>
                            <div class=" col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>

                                            Short Description
                                        </strong>
                                    </label>
                                    <div>{{ $post->short_description }}</div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Post Category
                                        </strong>
                                    </label>
                                    <div>{{ $post->postCategory->name }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">
                                        <strong>
                                            Slug
                                        </strong>
                                    </label>
                                    <div>{{ $post->slug }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Body </label>
                                    <div class="border p-2" id="content">{!! $post->body !!}</div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const headings = document.querySelectorAll("#content h1, #content h2, #content h3, #content h4, #content h5, #content h6");
        const toc = document.getElementById("table-of-contents");

        toc.innerHTML = "<strong>Table of Contents</strong><ul></ul>";

        const tocList = toc.querySelector("ul");

        headings.forEach(function (heading) {
            const anchorId = heading.id || heading.textContent.replace(/\s+/g, "-").toLowerCase();
            heading.id = anchorId;

            const listItem = document.createElement("li");
            const anchor = document.createElement("a");
            anchor.href = `#${anchorId}`;

            // Add indentation based on heading level
            let level = parseInt(heading.tagName.charAt(1));
            let indentation = "\t".repeat(level - 1);
            anchor.textContent = indentation + heading.textContent;

            listItem.appendChild(anchor);
            tocList.appendChild(listItem);
        });
    });
</script> --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const headings = document.querySelectorAll(
            "#content h1, #content h2, #content h3, #content h4, #content h5, #content h6");
        const toc = document.getElementById("table-of-contents");

        toc.innerHTML = "<strong>Table of Contents</strong><ul></ul>";

        const tocList = toc.querySelector("ul");

        headings.forEach(function(heading) {
            const anchorId = heading.id || heading.textContent.replace(/\s+/g, "-").toLowerCase();
            heading.id = anchorId;

            const listItem = document.createElement("li");
            const anchor = document.createElement("a");
            anchor.href = `#${anchorId}`;

            // Add CSS classes for indentation based on heading level
            let level = parseInt(heading.tagName.charAt(1));
            anchor.textContent = heading.textContent;
            anchor.classList.add(`heading-level-${level}`);

            listItem.appendChild(anchor);
            tocList.appendChild(listItem);
        });
    });
</script>
