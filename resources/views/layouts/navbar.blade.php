<header class="bg-white">
    <nav class="flex justify-between items-center w-[95%]  mx-auto">
        <div>
            <img class="w-16 cursor-pointer" src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png" alt="...">
        </div>
        <div
            class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-start px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-2">
                <li>
                    <a class="hover:text-gray-500" href="/">
                        <i class="fa fa-home text-xs"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">
                        <i class="fa fa-book text-xs"></i>
                        Courses
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6">
            @auth
            <div>
                <a href="{{route('adminDashboard')}}" class="">
                    <i class="fa fa-user mr-2 text-xs"></i>
                    {{$user->name}}
                </a>
            </div>
            @endauth
            @guest
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">
                    <a href="{{ route('login') }}">
                        <i class="fa fa-sign-in"></i>
                        Sign in
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
        navLinks.classList.toggle('top-[9%]')
    }
</script>
