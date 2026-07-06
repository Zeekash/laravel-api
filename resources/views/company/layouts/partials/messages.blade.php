@if ($errors->any())
    <div class="alert alert-danger alert-dimissable fade show mx-auto" style="15%" id="hide-msg">
        <i class="fa fa-times-circle"></i>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dimissable fade show mx-auto" style="15%" id="hide-msg">
        <i class="fa fa-check-circle"></i>

        {{ Session::get('success') }}

    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dimissable fade show mx-auto" style="15%" id="hide-msg">
        <i class="fa fa-times-circle"></i>

        {{ Session::get('error') }}

    </div>
@endif
