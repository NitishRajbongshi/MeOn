<div class="relative min-h-screen md:flex">
    <!-- mobile menu bar -->
    <div class="bg-gray-200 text-gray-800 flex justify-end md:hidden">
        {{-- <a href="#" class="block p-4 text-white font-bold">Dashboard</a> --}}
        <button class="mobile-menu-button p-2 focus:outline-none focus:bg-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div
        class="sidebar bg-slate-300 text-slate-800 font-bold w-64 p-2 space-y-2 md:relative md:translate-x-0 absolute inset-y-0 left-0 transform transition duration-200 ease-in-out -translate-x-full">
        {{-- <a href="#" class="text-white flex items-center space-x-2 p-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
            </svg>
            <span class="text-2xl font-extrabold">Cloudvine</span>
        </a> --}}
        <nav>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:text-white hover:bg-slate-600">
                <i class="fa fa-user mr-2"></i>
                My Profile
            </a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:text-white hover:bg-slate-600">
                <i class="fa-solid fa-shield mr-2"></i>
                My Plans
            </a>
        </nav>
    </div>

    <main class="flex-1">
        {{ $slot }}
    </main>
</div>
<script>
    const btn = document.querySelector(".mobile-menu-button");
    const sidebar = document.querySelector(".sidebar");

    btn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });
</script>
