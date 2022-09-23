<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/app.css">
</head>

<body id="body">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Register
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div>
                            <label for="name">Name</label>
                            <input type="name" class="text-input" id="name" name="name"
                                aria-describedby="nameHelp">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="text-input" id="email" name="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="text-input" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="text-input" id="password_confirmation" name="password_confirmation">
                        </div>
                        
                        <button type="submit" class="button">Sign Up</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                Already have an account?&nbsp
                <a href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>
</body>

</html>
