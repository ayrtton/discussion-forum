<section id="hero">
    <div id="layer">
        <div id="content">
            <div id="message">Welcome to our forum!</div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"><div id="start-button">Get Started</div></a>
                @else
                    <a href="{{ route('login') }}"><div id="start-button">Get Started</div></a>
                @endauth
            @endif
        </div>
    </div>
</section>
