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



        <!-- forgot password form start-->
        <div class="login__form" id="forgotform" style="">

            <div style="text-align: center;">
                <h1 class="login__title">
                    <span>Reset Password</span>
                </h1>
                <p class="login__description">
                    Reset Password
                </p>

                @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif



           </div>
            <form method="POST" action="{{route('employee.forgot-password.email-verified')}}" >
                @csrf
            <div>
                <div class="login__inputs">
                    <div>
                        <label for="input-email" class="login__label">User Name</label>
                        <input type="text"  name="username" placeholder=""  class="login__input" id="input-email" autocomplete="off" value="">
                        @error('username')
                        <div>{{ $message }}</div>
                    @enderror
                    </div>


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
                    <button class="login__button login__button-ghost" id="passwordback" onclick="window.location.href='{{ route('employee.login') }}'"> Back</button>
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
