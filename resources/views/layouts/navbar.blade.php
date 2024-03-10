<header class="shadow-sm bg-white">
    <nav class="flex justify-between items-center w-[95%]  mx-auto">
        <div>
            {{-- <img class="w-16 cursor-pointer" src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png" alt="..."> --}}
            <p class="text-xl py-3 font-bold">EDORB</p>
        </div>
        <div
            class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[40vh] left-0 top-[-100%] md:w-auto  w-full flex items-start px-5 py-4">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-2">
                <li>
                    <a class="hover:text-gray-500 text-lg font-bold" href="/">
                        {{-- <i class="fa fa-home"></i> --}}
                        EDORB
                    </a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="/">
                        <i class="fa fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">
                        <i class="fa fa-comments"></i>
                        Blog
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6">
            @auth
                <div class="flex justify-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative block text-sm overflow-hidden focus:outline-none">
                            {{ $user->name }}
                            <i class="fa fa-user mr-2 text-xs"></i>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full">
                        </div>

                        <div x-show="dropdownOpen"
                            class="absolute right-0 mt-2 w-48 bg-white shadow-xl z-20">
                            <ul>
                                <li>
                                    <a href="{{route('adminDashboard')}}"
                                        class="block px-4 py-2 text-sm capitalize text-gray-800 hover:bg-indigo-500 hover:text-white">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm capitalize text-gray-800 hover:bg-indigo-500 hover:text-white">
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                    class="block px-4 py-2 text-sm capitalize text-gray-800 hover:bg-indigo-500 hover:text-white">
                                    Settings
                                </a>
                                </li>
                                <li class="w-full hover:bg-red-200">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="flex items-center px-4 py-2 text-sm capitalize text-red-900 focus:outline-none">
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
                <button class="text-xs">
                    <a href="{{ route('login') }}">
                        <i class="fa fa-sign-in"></i>
                        Login
                    </a>
                </button>

            @endguest
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
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
