 @extends('layouts.app')
 @section('content')

     <section class="login-area ptb-100">
         <div class="container">
             <div>
                 <div class="login-form h2-div-login-form p-4">
                     <h2 class="text-center m-0">RESET PASSWORD</h2>
                 </div>
                 <form action="{{ route('reset.password.post') }}" method="POST" class="login-form">
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
                     <input type="hidden" name="token" value="{{ $token }}">
                     <div class="input-group my-4">
                         <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                             aria-label="Sizing example input" placeholder="Enter Your Email"
                             aria-describedby="inputGroup-sizing-default">
                         @if ($errors->has('email'))
                             <span class="text-danger">{{ $errors->first('email') }}</span>
                         @endif

                         <span class="input-group-text" id="inputGroup-sizing-default"><i
                                 class="fa fa-user-circle"></i></span>
                     </div>
                     <div class="input-group my-4">
                         <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                             id="password" placeholder="Password" required="true" aria-label="password"
                             aria-describedby="basic-addon1">
                         @if ($errors->has('password'))
                             <span class="text-danger">{{ $errors->first('password') }}</span>
                         @endif
                         <span class="input-group-text" onclick="password_show_hide();">
                             <i class="fas fa-eye" id="show_eye"></i>
                             <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                         </span>
                     </div>
                     <div class="input-group my-4">
                         <input type="password" id="password_confirmation"
                             class="form-control @error('password_confirmation') is-invalid @enderror"
                             name="password_confirmation" placeholder="Confirm Password" required="true"
                             aria-label="password" aria-describedby="basic-addon1">
                         @if ($errors->has('password_confirmation'))
                             <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                         @endif
                         <span class="input-group-text" onclick="password_confirmation_show_hide();">
                             <i class="fas fa-eye" id="password_confirmation_show_eye"></i>
                             <i class="fas fa-eye-slash d-none" id="password_confirmation_hide_eye"></i>
                         </span>
                     </div>

                     <div class="col-12 d-flex mx-auto mt-5 align-items-center justify-content-center">
                         <button type="submit" class="default-btn">SUBMIT</button>
                     </div>
                     </button>

                 </form>
             </div>
         </div>
     </section>
     <script>
         function password_show_hide() {
             var x = document.getElementById("password");
             var show_eye = document.getElementById("show_eye");
             var hide_eye = document.getElementById("hide_eye");
             hide_eye.classList.remove("d-none");
             if (x.type === "password") {
                 x.type = "text";
                 show_eye.style.display = "none";
                 hide_eye.style.display = "block";
             } else {
                 x.type = "password";
                 show_eye.style.display = "block";
                 hide_eye.style.display = "none";
             }
         }

         function password_confirmation_show_hide() {
             var x = document.getElementById("password_confirmation");
             var show_eye = document.getElementById("password_confirmation_show_eye");
             var hide_eye = document.getElementById("password_confirmation_hide_eye");
             hide_eye.classList.remove("d-none");
             if (x.type === "password") {
                 x.type = "text";
                 show_eye.style.display = "none";
                 hide_eye.style.display = "block";
             } else {
                 x.type = "password";
                 show_eye.style.display = "block";
                 hide_eye.style.display = "none";
             }
         }
     </script>
 @endsection
