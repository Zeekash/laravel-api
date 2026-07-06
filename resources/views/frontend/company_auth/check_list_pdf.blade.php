<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.1/css/all.min.css">
    <meta name="robots" content="noindex, nofollow">
    <title>Moving Checklist</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url("https://cdn.jsdelivr.net/gh/google/fonts/ofl/dejavu/DejaVuSans.ttf") format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        ul {
            text-align: left;
            display: inline-block;
            margin: 0 auto;
            list-style-type: none;
            padding-left: 0;
        }

        .checked {
            text-decoration: line-through;
            color: grey;
        }

        p {
            /* margin-left: 25px; */
            display: inline-flex;
            margin-bottom: -4px;
        }

        .item-heading {
            font-family: var(--family);
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div>
        <h2>The All-In-One Moving Checklist</h2>
        {{-- <p> This moving checklist is brought to you by <a href="https://mygoodmovers.com/">MyGoodMovers.com</a>. For an
            interactive experience and more detailed steps, visit: <a
                href="https://mygoodmovers.com/moving-checklist">https://mygoodmovers.com/moving-checklist</a></p> --}}
    </div>
    @php
        $currentCategory = '';
    @endphp
    <ul>
        @foreach ($data as $item)
            @if ($item['category'] !== $currentCategory)
                <!-- Display category heading if it changes -->
                <hr>
                <li style="font-weight: 800; font-size: 26px; margin-top: 20px;margin-bottom:10px;">
                    {{ $item['category'] }}
                </li>
                @php
                    $currentCategory = $item['category'];
                @endphp
            @endif
            <li class="checklist-item {{ $item['checked'] ? 'checked' : '' }}">
                {!! $item['checked'] ? '☑' : '☐' !!}
                <span class="item-heading">{!! $item['heading'] !!}</span>
                {{-- <div class="item-text"> --}}
                {{-- {!! $item['text'] !!} --}}
                {{-- </div> --}}
            </li>
        @endforeach
    </ul>
</body>

</html>
