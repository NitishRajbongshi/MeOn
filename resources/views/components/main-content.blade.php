<div class="w-full">
    <dh-component>
        <div class="w-64 min-h-screen z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
            id="mobile-nav">
            <button aria-label="toggle sidebar" id="openSideBar"
                class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
                onclick="sidebarHandler(true)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="6" cy="10" r="2" />
                    <line x1="6" y1="4" x2="6" y2="8" />
                    <line x1="6" y1="12" x2="6" y2="20" />
                    <circle cx="12" cy="16" r="2" />
                    <line x1="12" y1="4" x2="12" y2="14" />
                    <line x1="12" y1="18" x2="12" y2="20" />
                    <circle cx="18" cy="7" r="2" />
                    <line x1="18" y1="4" x2="18" y2="5" />
                    <line x1="18" y1="9" x2="18" y2="20" />
                </svg>
            </button>
            <button aria-label="Close sidebar" id="closeSideBar"
                class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
                onclick="sidebarHandler(false)">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
            <div class="px-8">
                <div class="w-full my-4 flex items-center text-lg text-white">
                    <i class="fa fa-bars mr-2" aria-hidden="true"></i>
                    <p>Dashboard</p>
                </div>
                <ul class="mt-4">
                    <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                            <i class="fa fa-user mr-3 text-sm" aria-hidden="true"></i>
                            <span class="text-sm">Profile</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                        <a href="{{ route('manageClass') }}"
                            class="flex items-center focus:outline-none hover:text-gray-400">
                            <i class="fa fa-book mr-3 text-sm"></i>
                            <span class="text-sm">Manage Class</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                            <i class="fa fa-pen mr-3 text-sm"></i>
                            <span class="text-sm">Manage Subject</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                            <i class="fa fa-sticky-note mr-3 text-sm" aria-hidden="true"></i>
                            <span class="text-sm">Manage Notes</span>
                        </a>
                    </li>

                    <li class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                            <i class="fa fa-cog mr-3 text-sm" aria-hidden="true"></i>
                            <span class="text-sm">Settings</span>
                        </a>
                    </li>

                    <li class="flex w-full justify-between text-red-600 cursor-pointer items-center mb-6">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-sign-out mr-3 text-sm" aria-hidden="true"></i>
                                <span class="text-sm">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

        <div class="container mx-auto py-1">
            <div class="flex gap-1">
                <!-- First Column (Side Navbar) -->
                <div class="w-3/12 hidden md:block bg-white">
                    <div class="px-4 text-indigo-800">
                        <div class="w-full my-4 flex items-center text-lg p-2 hover:bg-blue-200 hover:rounded-md">
                            <a href="{{ route('adminDashboard') }}">
                                <i class="fa fa-bars mr-1" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </div>
                        <ul class="mt-2">
                            <li class="menuTitle">
                                <button class="flex text-lg justify-between w-full p-2 hover:bg-blue-200 hover:rounded-md">
                                    <div><i class="fa fa-book mr-2 text-md"></i>Manage Notes</div>
                                    <div class="ms-4"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
                                </button>
                                <ul class="text-md subMenuItem hidden ms-3">
                                    <li class="my-2">
                                        <a href="{{ route('manageClass') }}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Class</span>
                                        </a>
                                    </li>
                                    <li class="my-2">
                                        <a href="{{ route('manageSubject') }}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Subject</span>
                                        </a>
                                    </li>
                                    <li class="my-2">
                                        <a href="{{ route('manageChapter') }}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Chapter</span>
                                        </a>
                                    </li>
                                    <li class="my-2">
                                        <a href="{{ route('manageNote') }}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Notes</span>
                                        </a>
                                    </li>
                                    <li class="my-2">
                                        <a href="{{ route('classCategory') }}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mt-2">
                            <li class="menuTitle">
                                <button class="flex text-lg justify-between w-full p-2 hover:bg-blue-200 hover:rounded-md">
                                    <div><i class="fa fa-flask mr-[0.5rem] text-md" aria-hidden="true"></i>Manage Exam</div>
                                    <div class="ms-4"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
                                </button>
                                <ul class="text-md subMenuItem hidden ms-3">
                                    <li class="my-2">
                                        <a href="{{route('addExamLink')}}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Exam Links</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mt-2">
                            <li class="menuTitle">
                                <button class="flex text-lg justify-between w-full p-2 hover:bg-blue-200 hover:rounded-md">
                                    <div><i class="fa fa-info-circle mr-[0.4rem] text-md" aria-hidden="true"></i>Manage Info</div>
                                    <div class="ms-4"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
                                </button>
                                <ul class="text-md subMenuItem hidden ms-3">
                                    <li class="my-2">
                                        <a href="{{route('marquee')}}"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Marquee</span>
                                        </a>
                                    </li>
                                    <li class="my-2">
                                        <a href="#"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Add Main Banner</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mt-2">
                            <li class="menuTitle">
                                <button class="flex text-lg justify-between w-full p-2 hover:bg-blue-200 hover:rounded-md">
                                    <div><i class="fa fa-sitemap mr-[0.3rem] text-md" aria-hidden="true"></i>Manage Site</div>
                                    <div class="ms-4"><i class="fa fa-caret-left" aria-hidden="true"></i></div>
                                </button>
                                <ul class="text-md subMenuItem hidden ms-3">
                                    <li class="my-2">
                                        <a href="#"
                                            class="flex items-center focus:outline-none hover:text-gray-400">
                                            <i class="fa fa-genderless mr-1" aria-hidden="true"></i>
                                            <span class="text-md">Setting</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mt-2">
                            {{-- <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-user mr-3 text-md" aria-hidden="true"></i>
                                <span class="text-md">Manage Profile</span>
                            </a>
                        </li> --}}

                            {{-- <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-cog mr-3 text-md" aria-hidden="true"></i>
                                <span class="text-md">Settings</span>
                            </a>
                        </li> --}}
                            {{-- <li class="flex w-full justify-between text-red-600 cursor-pointer items-center mb-6">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center focus:outline-none hover:text-gray-400">
                                    <i class="fa fa-sign-out mr-2 text-md" aria-hidden="true"></i>
                                    <span class="text-md">Logout</span>
                                </button>
                            </form>
                        </li> --}}
                        </ul>
                    </div>
                </div>

                <!-- Middle Column (Main Container) -->
                <div class="w-full md:w-9/12 bg-white">
                    <!-- Main content goes here -->
                    <div class="min-h-screen mx-auto p-1 md:p-4 md:8/12">
                        <div class="w-full h-auto p-1 md:p-2 rounded bg-white">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var sideBar = document.getElementById("mobile-nav");
            var openSidebar = document.getElementById("openSideBar");
            var closeSidebar = document.getElementById("closeSideBar");
            sideBar.style.transform = "translateX(-260px)";

            function sidebarHandler(flag) {
                if (flag) {
                    sideBar.style.transform = "translateX(0px)";
                    openSidebar.classList.add("hidden");
                    closeSidebar.classList.remove("hidden");
                } else {
                    sideBar.style.transform = "translateX(-260px)";
                    closeSidebar.classList.add("hidden");
                    openSidebar.classList.remove("hidden");
                }
            }

            $('.menuTitle').on('click', function() {
                const nextElement = $(this).find('ul.subMenuItem');
                $(nextElement[0]).toggle('medium');
            })
        </script>

    </dh-component>
</div>
