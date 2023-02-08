
<header class="w-full h-[6rem] top-0 left-0 bg-yellow-600">
    <div class="w-full h-full container mx-auto flex justify-between items-center">
        <h2 class="text-[1.3rem] font-[900] text-black uppercase">
            <a href="{{ route("index") }}">{{ __("laravel") }}</a>
        </h2>
        <nav>
            <ul class="flex item-center gap-5">
                @auth
                <li>
                    <a href="{{ route("profile.show") }}" class="text-[1rem] font-[700] text-gray-800 uppercase">{{ auth()->user()->username }}</a>
                </li>
                @endauth
                @guest
                <li>
                    <a href="{{ route("login") }}" class="text-[1rem] font-[700] text-gray-800 uppercase">{{ __("login") }}</a>
                </li>
                @endguest
                @if (Route::has('register'))
                    <li>
                        <a href="{{ route("register") }}" class="text-[1rem] font-[700] text-gray-800 uppercase">{{ __("Register") }}</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>