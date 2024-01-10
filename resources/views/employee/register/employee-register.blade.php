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
            <img src="{{asset('login/assets/img/bg-login.png')}}" alt="login image" class="login__img">

            <div class="login__form">

                <div>

                    <h1 class="login__title">
                        <span>Welcome</span> Back
                    </h1>
                    <p class="login__description">
                        Welcome! Please Register here
                    </p>

                    @if ($errors->has('message'))
                    <p>{{ $errors->first('message') }}</p>
                @endif

                </div>
                <form method="POST" action="{{ route('employee.handleregister') }}">
                    @csrf
                <div>
                    <div class="login__inputs">

                        <div>
                            <label for="input-username" class="login__label">Employee Name</label>
                            <input type="text" name="username" placeholder="Enter your employee name" class="login__input" id="input-username">
                            @error('username')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="input-email" class="login__label">Employee Email</label>
                            <input type="text" name="email" placeholder="Enter your employee email" class="login__input" id="input-email">
                            @error('email')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>


                        <div>
                            <label for="input-pass" class="login__label">Password</label>
                            <div class="login__box">
                                <input type="password" name="password" placeholder="Enter your password" class="login__input" id="input-pass">
                                <i class="ri-eye-off-line login__eye" id="input-icon"></i>
                            </div>
                            @error('password')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="login__check">
                        <input type="checkbox" class="login__check-input" id="input-check">
                        <label for="input-check" class="login__check-label">Remember me</label>
                    </div>
                </div>

                <div>
                    <div class="login__buttons">
                        <button type="submit" class="login__button">Sign In</button>
                        {{-- <button class="login__button login__button-ghost">Sign Up</button> --}}
                    </div>

                    <a href="#" class="login__forgot">Forgot Password?</a>
                </div>
            </form>
        </div>
        </div>
    </div>
    <!---login page end-->


     <!--=============== MAIN JS ===============-->
     <script src="{{asset('login/assets/js/main.js')}}"></script>
</body>
</html>
