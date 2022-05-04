<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Email Verification</title>
    <link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
</head>

<body id="body">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div>
                    <p>Thanks for signing up!</p> 
                    <p>Before getting started, could you verify your email address by clicking on
                    the link we just emailed to you?</p>
                    <p>If you didn't receive the email, we will gladly send you another.</p>
                </div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="button">Resend Email</button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
