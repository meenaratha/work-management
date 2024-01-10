<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee login </title>

     <!--=============== REMIXICONS ===============-->
     <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

     <!--=============== CSS ===============-->
     <link rel="stylesheet" href="{{asset('login/assets/css/styles.css')}}">
</head>
<body>
    <!--login page start--->
    <div class="container">
        <div class="login__content">
            {{-- <img src="{{asset('login/assets/img/bg-login.png')}}" alt="login image" class="login__img"> --}}

            <div class="login__form" id="loginform">

                <div style="text-align: center;">
                    <h1 class="login__title">
                        <span>Password Reset</span>
                    </h1>
                    <p class="login__description">
                        Welcome to Work Management Tool.
                    </p>

                    @if (session('error'))

                    <p style="color: red; font-weight:500;margin-top:6px;"> *{{session('error')}}</p>

                    @endif

                </div>
                <form method="POST" action="{{route('employee.password-reseted')}}" autocomplete="off">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                <div>
                    <div class="login__inputs">

                        <div>
                            <label for="input-email" class="login__label">User Name</label>
                            <input type="text"  name="email" placeholder=""  class="login__input" id="input-email" autocomplete="off" value="">
                            @error('email')
                           <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="input-pass"  class="login__label">Password</label>

                            <div class="login__box">
                                <input type="password" name="password" placeholder=""  class="login__input" id="input-pass" autocomplete="off" value=" va">
                                <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                            </div>
                            @error('password')
                           <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="input-pass"  class="login__label">Confirm Password</label>

                            <div class="login__box">
                                <input type="password" name="password_confirmation" placeholder=""  class="login__input" id="input-pass" autocomplete="off" value=" va">
                                <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                            </div>
                            @error('password_confirmation')
                           <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="login__check">
                        <input type="checkbox" class="login__check-input" id="input-check">
                        <label for="input-check" class="login__check-label">Remember me</label>
                    </div> --}}
                </div>

                <div>
                    <div class="login__buttons">
                        <a href="#" class="login__forgot" id="forgot-btn">Forgot Password?</a>
                        <button type="submit" class="login__button">Reset Password</button>
                        {{-- <button class="login__button login__button-ghost">Sign Up</button> --}}
                    </div>


                </div>
              </form>
            </div>

        <!-- forgot password form start-->
        <div class="login__form" id="forgotform" style="display: none;">

            <div style="text-align: center;">
                <h1 class="login__title">
                    <span>Reset Password</span>
                </h1>
                <p class="login__description">
                    Reset Password
                </p>

                @if (Session::has('message'))

                <p style="color: red; font-weight:500;margin-top:6px;">
                    {{Session::get('message')}}
                </p>

                @endif

            </div>
            <form method="POST" action="{{route('employee.forgot-password.email-verified')}}" >
                @csrf
            <div>
                <div class="login__inputs">

                    <div>
                        <label for="input-email" class="login__label">Email</label>
                        <input type="text"  name="email" placeholder=""  class="login__input" id="input-email" autocomplete="off" value="">
                        @error('email')
                       <div>{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <div>
                <div class="login__buttons">
                    <button class="login__button login__button-ghost" id="passwordback"> Back</button>
                    <button type="submit" class="login__button">Email Verify</button>

                </div>
            </div>
          </form>
        </div>


         <!-- forgot password form start-->



























    </div>
    </div>
    <!---login page end-->


     <!--=============== MAIN JS ===============-->
     <script src="{{asset('login/assets/js/main.js')}}"></script>
     <script src="{{asset('login/assets/js/form.js')}}"></script>

</body>
</html>
