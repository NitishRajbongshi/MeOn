@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen">
        {{-- Content section --}}
        <div class="p-1 text-white bg-slate-700">
            <div class="text-center my-12">
                <h1 class="text-2xl font-bold">GET IN TOUCH</h1>
                <p class="text-lg">Let's make something awesome together</p>
            </div>
            <div class="flex flex-wrap justify-between items-center my-3">
                <div class="w-full md:w-[33%] text-center">
                    <i class="my-2 fa fa-compass text-3xl text-slate-700 rounded-full p-6 bg-slate-100"></i>
                    <h3 class="text-2xl">Address</h3>
                    <p class="text-lg">Assam, India</p>
                </div>
                <div class="w-full md:w-[33%] text-center">
                    <i class="my-2 fa fa-phone text-3xl text-slate-700 rounded-full p-6 bg-slate-100"></i>
                    <h3 class="text-2xl">Phone</h3>
                    <p class="text-lg">+91 7002390253</p>
                </div>
                <div class="w-full md:w-[33%] text-center">
                    <i class="my-2 fa fa-envelope text-3xl text-slate-700 rounded-full p-6 bg-slate-100"></i>
                    <h3 class="text-2xl">Email</h3>
                    <p class="text-lg">ankurjyoti902@gmail.com</p>
                </div>
            </div>
        </div>
        {{-- Form section --}}
        <h2 class="text-center text-2xl my-6 font-bold">Share Your Thoughts</h2>
        <div class="">
            <form action="" method="">
                <div class="flex justify-between items-center flex-wrap p-2">
                    <div class="w-full md:w-[33%]">
                        <label class="font-bold text-md" for="name">
                            <i class="fa fa-user"></i>
                            Name
                        </label><br>
                        <input type="text" id="name" name="name" class="border border-blue-300 w-full p-2 outline-none"
                            placeholder="John Doe" required>
                    </div>
                    <div class="w-full md:w-[33%]">
                        <label class="font-bold text-md" for="email">
                            <i class="fa fa-envelope"></i>
                            Email
                        </label><br>
                        <input type="email" id="email" name="email" class="border border-blue-300 w-full p-2 outline-none"
                            placeholder="johndoe@gmail.com" required>
                    </div>
                    <div class="w-full md:w-[33%]">
                        <label class="font-bold text-md" for="contact">
                            <i class="fa fa-phone"></i>
                            Contact
                        </label><br>
                        <input type="text" id="contact" name="contact" class="border border-blue-300 w-full p-2 outline-none"
                            placeholder="xxxxx xxxxx">
                    </div>
                </div>
                <div class="p-2">
                    <label class="font-bold text-md" for="message">
                        <i class="fa fa-message"></i>
                        Message
                    </label><br>
                    <textarea rows="4" id="message" name="message"
                        class="w-full border border-blue-300 rounded-sm outline-none p-1"
                        placeholder="Write your message here..."></textarea>
                </div>
                <div class="flex justify-end my-1 p-2">
                    <a href="{{ route('home') }}" class="mx-2 pt-1 border border-red-300 bg-red-200 px-2 text-red-600 rounded-sm">
                        <i class="fa fa-backward mr-1"></i>
                        Back to home
                    </a>
                    <button
                        class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-md font-bold"
                        type="submit">
                        <i class="fa fa-paper-plane mr-1"></i>
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.footer')
@endsection
