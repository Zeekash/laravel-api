@extends('layouts.app')
@section('title','forget-password')
@section('meta_description','forget-password of company')
@section('content')
    <section class="login-area ptb-100">
        <div class="container">
            <div>
                <div class="login-form h2-div-login-form p-4">
                    <h2 class="text-center m-0">RESET</h2>
                </div>
                <form action="{{ route('forget.password.post') }}" method="POST" class="login-form">
                    @csrf
                    <!-- Start Alerts -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dimissable fade show" id="hide-msg">
                            <i class="fa fa-check-circle"></i>

                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dimissable fade show" style="15%" id="hide-msg">
                            <i class="fa fa-times-circle"></i>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dimissable fade show" style="15%" id="hide-msg">
                            <i class="fa fa-times-circle"></i>

                            {{ Session::get('error') }}

                        </div>
                    @endif
                    <!-- End Alerts -->

                    <div class="input-group my-4">
                        <input type="text" class="form-control" name="email" aria-label="Sizing example input"
                            placeholder="Enter Your Email" aria-describedby="inputGroup-sizing-default">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <span class="input-group-text" id="inputGroup-sizing-default"><i
                                class="fa fa-user-circle"></i></span>
                    </div>
                    <div class="col-12 d-flex mx-auto mt-5 align-items-center justify-content-center">
                        <button type="submit" class="default-btn">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        $('#hide-msg').show();
        setTimeout(function() {
            $('#hide-msg').hide();
        }, 3000);
    </script>
@endsection
