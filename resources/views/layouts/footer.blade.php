<footer class="border-t bg-white">
    <div class="container px-8 mx-auto">

        <div class="flex flex-col w-full py-6 md:flex-row">

            <div class="flex-1 mb-6 text-black">
                <a class="text-sm font-bold text-orange-600 no-underline hover:no-underline lg:text-xl" href="#">
                    <img class="inline-block" src="{{ asset('images/main_logo.png') }}" alt="logo" width="50rem;" height="auto"> EDORB
                </a>
            </div>


            <div class="flex-1">
                <p class="text-gray-500 uppercase md:mb-6">Links</p>
                <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="{{ route('contact.us') }}" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Contact Us</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="{{ route('about') }}" class="text-gray-800 no-underline hover:underline hover:text-orange-500">About Us</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Support</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="text-gray-500 uppercase md:mb-6">Legal</p>
                <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Terms</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="{{ url('/sitemap.xml') }}" class="text-gray-800 no-underline hover:underline hover:text-orange-500">SiteMap</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="text-gray-500 uppercase md:mb-6">Social</p>
                <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Facebook</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Linkedin</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="text-gray-500 uppercase md:mb-6">Company</p>
                <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Official
                            Blog</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">About
                            Us</a>
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                        <a href="#" class="text-gray-800 no-underline hover:underline hover:text-orange-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>