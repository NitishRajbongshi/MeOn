<div class="w-full">
    <dh-component>
        <div class="flex flex-no-wrap">
            <div style="min-height: auto" class="w-64 absolute sm:relative bg-slate-50 md:h-full flex-col justify-between hidden sm:flex">
                <div class="px-8">
                    <div class="w-full my-4 flex items-center text-lg text-black">
                        <a href="{{route('adminDashboard')}}">
                            <i class="fa fa-bars mr-1" aria-hidden="true"></i>
                            Dashboard
                        </a>
                    </div>
                    <ul class="mt-4">
                        <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-user mr-3 text-md" aria-hidden="true"></i>
                                <span class="text-md">Manage Profile</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="{{route('manageClass')}}" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-book mr-3 text-md"></i>
                                <span class="text-md">Manage Class</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="{{route('manageSubject')}}" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-file-text mr-3 text-md"></i>
                                <span class="text-md">Manage Subject</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="{{route('manageChapter')}}" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-newspaper mr-2" aria-hidden="true"></i>
                                <span class="text-md">Manage Chapter</span>
                            </a>
                        </li>
                        <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="{{route('manageNote')}}" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-sticky-note mr-3 text-md" aria-hidden="true"></i>
                                <span class="text-md">Manage Notes</span>
                            </a>
                        </li>

                        <li class="flex w-full justify-between text-blue-900 cursor-pointer items-center mb-6">
                            <a href="javascript:void(0)" class="flex items-center focus:outline-none hover:text-gray-400">
                                <i class="fa fa-cog mr-3 text-md" aria-hidden="true"></i>
                                <span class="text-md">Settings</span>
                            </a>
                        </li>

                        <li class="flex w-full justify-between text-red-600 cursor-pointer items-center mb-6">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-center focus:outline-none hover:text-gray-400">
                                    <i class="fa fa-sign-out mr-3 text-md" aria-hidden="true"></i>
                                    <span class="text-md">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-64 min-h-screen z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out" id="mobile-nav">
                <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800" onclick="sidebarHandler(true)">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            <a href="{{route('manageClass')}}" class="flex items-center focus:outline-none hover:text-gray-400">
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
                            <form action="{{route('logout')}}" method="POST">
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
            <!-- Sidebar ends -->
            <!-- Remove class [ h-64 ] when adding a card block -->
            <div class="container border-s min-h-screen mx-auto p-1 md:p-4 md:w-4/5">
                <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
                <div class="w-full h-auto p-1 md:p-2 rounded bg-white">
                    <!-- Place your content here -->
                    {{$slot}}
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
        </script>
        
    </dh-component>
</div>