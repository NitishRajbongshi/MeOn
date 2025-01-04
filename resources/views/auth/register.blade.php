@extends('layouts.app')

@section('content')
    <x-show-notification />
    <div class="flex justify-center items-center h-screen">
        <div class="w-[60rem] h-full md:h-auto flex flex-wrap justify-center bg-white shadow-md rounded-md">
            <div class="hidden md:w-1/2 md:border-e md:p-10 md:flex md:justify-center md:items-center">
                <img src="{{ asset('images/auth/registration_image.png') }}" alt="logo" width="100%" height="100%">
            </div>
            <div class="w-full md:w-1/2 p-5">
                <div class="border-b mb-3">
                    <h3 class="text-3xl text-blue-700 font-bold py-2 text-center">
                        <i class="fa-sharp fa-solid fa-arrow-right-to-bracket"></i>
                        Register
                    </h3>
                    <p class="text-lg text-gray-600 font-bold pb-2 text-center">Register to EDORB</p>
                </div>
                <div>
                    <form action="{{ route('register') }}" method="POST" autocomplete="off" class="flex flex-col">
                        @csrf
                        <label class="text-lg text-blue-700 font-bold mb-2" for="email">
                            <i class="fa-solid fa-envelope me-2"></i>
                            Email
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="email" name="email" id="email" placeholder="Example@gmail.com">
                        @error('email')
                            <p class="text-sm text-red-700 mb-3">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
    
                        {{-- <label class="text-lg text-blue-700 font-bold mb-2" for="username">
                            <i class="fa-solid fa-user me-2"></i>
                            Username
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="username" name="username" id="username" placeholder="JohnDoe200">
                        @error('username')
                            <p class="text-sm text-red-700 mb-3">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror --}}

                        <label class="text-lg text-blue-700 font-bold mb-2" for="name">
                            <i class="fa-solid fa-user me-2"></i>
                            Name
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="name" name="name" id="name" placeholder="John Doe">
                        @error('name')
                            <p class="text-sm text-red-700 mb-3">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror

                        <label class="text-lg text-blue-700 font-bold mb-2" for="password">
                            <i class="fa-solid fa-unlock me-2"></i>
                            Password
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="password" name="password" id="password" placeholder="************">
                        @error('password')
                            <p class="text-sm text-red-700 mb-3">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                        
                        <label class="text-lg text-blue-700 font-bold mb-2" for="password_confirmation">
                            <i class="fa-solid fa-lock me-2"></i>
                            Confirm Password
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="password" name="password_confirmation" id="password_confirmation" placeholder="************">
    
                        <button class="bg-blue-700 text-white py-2 rounded-full my-3 hover:bg-blue-800" type="submit" name="login"><i class="fa-solid fa-key me-2"></i>Register</button>
                    </form>
    
                    <div class="text-center">
                        <span>Already have an account? <a class="text-blue-700" href="{{route('login')}}">Login here</a></span>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .backgroundImage {
            position: relative;
            background-image: url('images/background/image2.jpg');
            background-size: cover;
            background-position: center;
            background-color: rgba(255, 255, 255, 0.8);
        }
    </style>
@endpush
