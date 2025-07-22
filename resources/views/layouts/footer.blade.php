<footer class="bg-gray-900 text-white pt-5 pb-2">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between mb-4">
            <div class="mb-2 md:mb-0 md:w-1/4">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 flex items-center justify-center mr-2">
                        <img class="inline-block" src="{{ asset('images/main_logo.png') }}" alt="logo" width="50rem;"
                            height="auto">
                    </div>
                    <span class="text-xl font-bold">EDORB</span>
                </div>
                <p class="my-2 text-gray-400">&copy; 2025 Edorb. All rights reserved.</p>

                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="mb-8 md:mb-0">
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                    <li><a href="{{ route('about') }}"
                            class="text-gray-400 hover:text-white transition duration-300">About Us</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Courses</a>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Pricing</a>
                    </li>
                </ul>
            </div>

            <div class="mb-8 md:mb-0">
                <h4 class="text-lg font-semibold mb-4">Support</h4>
                <ul class="space-y-2">
                    <li><a href="{{ url('/sitemap.xml') }}"
                            class="text-gray-400 hover:text-white transition duration-300">
                            Site Map</a></li>
                    </li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Terms of
                            Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Privacy
                            Policy</a></li>
                    <li><a href="{{ route('contact.us') }}"
                            class="text-gray-400 hover:text-white transition duration-300">Contact
                            Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                <div class="flex">
                    <input type="email" placeholder="Your email"
                        class="px-4 py-2 rounded-l-md focus:outline-none text-gray-900 w-full">
                    <button class="gradient-bg hover:opacity-90 px-4 py-2 rounded-r-md font-medium">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
</footer>
