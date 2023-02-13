<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded ">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="https://flowbite.com/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap ">Flowbite</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">
                @if (Route::has('login'))
                    <div class="flex gap-2 mx-4">
                        @auth
                            <a href="{{ route('user.profile') }}" class="">Profile</a>
                            <a href="{{ route('meal.index') }}" class="">Meals</a>
                            <a href="#" onclick="document.getElementById('logout-form').submit()" class="">
                                <form id="logout-form" action="{{route('logout')}}" method="post">@csrf</form>
                                logout
                            </a>
                        @else
                            <a href="{{ route('registration') }}" class="">Register</a>
                            <a href="{{ route('login') }}" class="">Log in</a>
                        @endauth
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
  