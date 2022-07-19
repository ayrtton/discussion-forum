<nav id="navbar" class="fixed-top">
    <ul>
        @if (Route::has('login'))
            @auth
                <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            @else
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>

                @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            @endauth
            </div>
        @endif
    </ul>
</nav>
