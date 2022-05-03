<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
</head>

<body id="body">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="text-input" id="email" name="email"
                                aria-describedby="emailHelp" placeholder="Type your email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="text-input" id="password" name="password"
                                placeholder="Type your password">
                        </div>
                        <div>
                            <div id="password-remember">
                                Remember me
                                <input type="checkbox">
                            </div>
                            <p>
                                <a id="forgotten-password" href="{{ route('password.request') }}">Forgot
                                    your password?</a>
                            </p>
                        </div>
                        <button type="submit" class="button">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Don't have an account yet?&nbsp
                <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </div>
    </div>
</body>

</html>
