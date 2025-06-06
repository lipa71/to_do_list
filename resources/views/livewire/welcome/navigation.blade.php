<nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2  ring-1 ring-transparent transition text-white hover:text-white/80 focus-visible:ring-white"
        >
            Dashboard
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2  ring-1 ring-transparent transition  text-white hover:text-white/80 focus-visible:ring-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2  text-white hover:text-white/80 focus-visible:ring-white"
            >
                Register
            </a>
        @endif
    @endauth
</nav>
