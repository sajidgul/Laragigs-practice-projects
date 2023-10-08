<nav class="flex justify-between items-center mb-4">
    <a href="/"
        ><img class="w-24" src="{{asset('assets/images/logo.png')}}" alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
        <li>
            <span class="font-bold uppercase">
                Welcome {{ auth()->user()->name }}
            </span>
        </li>
        <li>
            <a href="manage">Manage Listings</a>
        </li>
        <li>
            <form method="POST" action="/logout">
            @csrf
            <button type="submit">
                <i class="fa-solid fa-door-closed">Logout</i>
            </button>
            </form>
        </li>
        @else
        <li>
            <a href="register" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="login" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
        @endauth
    </ul>
</nav>
