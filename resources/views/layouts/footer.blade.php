{{-- footer --}}
{{-- <div class="p-1"> --}}
    <div class="p-1" style="background: linear-gradient(90deg, rgb(238, 238, 238) 0%, rgb(212, 212, 212) 100%);">
    <div class="flex flex-row flex-wrap py-2">
        <div class="basis-full md:basis-1/3 flex flex-col justify-center items-center">
            <div>
                <img src="{{ asset('images/main_logo.png') }}" alt="logo" width="80rem;" height="auto">
            </div>
            <p class="text-xl font-bold">EDORB</p>
        </div>
        <div class="basis-full px-1 md:basis-1/3">
            <h1 class="underline font-bold text-lg pb-2">Important Link</h1>
            <ul>
                <li class="text-md"><a href="{{ route('contact.us') }}" class="hover:text-gray-500">Contact Us</a></li>
                <li class="text-md"><a href="{{ route('about') }}" class="hover:text-gray-500">About Us</a></li>
                <li class="text-md"><a href="#" class="hover:text-gray-500">Location</a></li>
                <li class="text-md"><a href="{{ url('/sitemap.xml') }}" class="hover:text-gray-500">SiteMap</a></li>
            </ul>
        </div>
        <div class="basis-full px-1 md:basis-1/3">
            <div class="text-2xl py-2">
                <a class="me-2" href="#" class="hover:text-gray-500"><i class="fa-brands fa-facebook"></i></a>
                <a class="me-2" href="#" class="hover:text-gray-500"><i class="fa-brands fa-instagram"></i></a>
                <a class="me-2" href="#" class="hover:text-gray-500"><i class="fa-brands fa-twitter"></i></a>
            </div>
            <p>
                Copyright
                <i class="fa fa-copyright" aria-hidden="true"></i>
                2024 Edorb.in
            </p>
            <div class="text-xs">
                <a href="https://nitishrajbongshi.github.io/visit_portfolio/" target="__blank">Developer info</a>
            </div>
        </div>
    </div>
</div>
