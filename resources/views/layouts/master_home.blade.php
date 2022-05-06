<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Discussion Forum</title>

    <link href=" {{ asset('css/landing-page.css') }} " rel="stylesheet">
</head>

<body>
    @include('layouts.body.header')
    @include('layouts.body.hero')
    <main id="main">
        @yield('home_content')
    </main>
    @include('layouts.body.footer')
</body>

</html>
