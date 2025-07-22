<header class="shadow-md bg-white">
    <nav class="container flex justify-between items-center w-[95%] mx-auto">
        <div>
            {{-- <img class="w-16 cursor-pointer" src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png" alt="..."> --}}
            <a href="/" class="flex justify-center items-center py-1">
                <img src="{{ asset('images/main_logo.png') }}" alt="logo" width="50rem;" class="hidden md:block">
                <span style="font-family: 'Lilita One', serif;" class="text-2xl py-3 text-blue-900">E D O R B</span>
            </a>
            {{-- <p class="text-xl py-3 font-bold">EDORB</p> --}}
        </div>
        <div class="nav-links duration-500 md:static bg-white absolute md:min-h-fit min-h-[40vh] left-0 top-[-100%] md:w-auto  w-full flex items-start px-5 py-4"
            style="z-index: 1;">
            <ul class="flex text-lg md:flex-row flex-col md:items-center md:gap-[4vw] gap-2">
                <li class="md:hidden">
                    <a style="font-family: 'Lilita One', serif;" class="hover:text-gray-500 text-lg text-blue-900" href="{{ route('home') }}">
                        E D O R B
                    </a>
                </li>
                <li>
                    <a class="font-bold hover:text-blue-500" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="font-bold hover:text-blue-500" href="{{ route('subscription') }}">
                        Pricing
                    </a>
                </li>
                <li>
                    <a class="font-bold hover:text-blue-500" href="#">
                        Blog
                    </a>
                </li>
                {{-- <li>
                    <div class="dropdown inline-block relative w-auto">
                        <button class=" text-gray-700 font-semibold inline-flex items-center">
                            <span class="mr-1">Classes</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                            <li class=""><a
                                    class="whitespace-nowrap rounded-b text-nowrap bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                    href="#">Three is the magic number</a></li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
        <div class="flex items-center gap-6">
            @auth
                <div class="flex justify-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative block text-sm overflow-hidden focus:outline-none text-blue-800">
                            {{ $user->name }}
                            <i class="fa fa-user mr-2 text-xs"></i>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full">
                        </div>

                        <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white shadow-xl z-20">
                            <ul>
                                @if ($user->admin)
                                    <li>
                                        <a href="{{ route('adminDashboard') }}"
                                            class="block px-4 py-2 text-sm capitalize text-gray-800 hover:bg-indigo-500 hover:text-white">
                                            Dashboard
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('user.profile', ['user' => Auth()->user()->name]) }}"
                                        class="block px-4 py-2 text-sm capitalize text-gray-800 hover:font-bold hover:bg-indigo-500 hover:text-white">
                                        <i class="fa fa-user mr-2 text-md" aria-hidden="true"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm capitalize text-gray-800 hover:font-bold hover:bg-indigo-500 hover:text-white">
                                        <i class="fa fa-gear mr-1 text-md" aria-hidden="true"></i>
                                        Settings
                                    </a>
                                </li>
                                <li class="w-full hover:bg-red-200">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center px-4 py-2 text-sm capitalize text-red-900 hover:font-bold focus:outline-none">
                                            <i class="fa fa-sign-out mr-2 text-md" aria-hidden="true"></i>
                                            <span class="text-md">Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endauth
            @guest
                <a href="{{ route('login') }}">
                    <button
                        class="text-md rounded-md border bg-blue-900 text-white px-4 py-2 hover:bg-blue-700 hover:shadow-md hover:shadow-blue-100">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </button>
                </a>

            @endguest
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"
                style="z-index: 1;"></ion-icon>
        </div>
    </nav>
</header>


<script>
    const navLinks = document.querySelector('.nav-links')

    function onToggleMenu(e) {
        e.name = e.name === 'menu' ? 'close' : 'menu'
        navLinks.classList.toggle('top-[0%]')
    }
</script>
