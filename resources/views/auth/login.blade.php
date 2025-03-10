@extends('layouts.app')

@section('content')
    <x-show-notification />
    {{-- <div class="flex justify-center items-center h-screen"
        style="background-color: #A9C9FF; background-image: linear-gradient(180deg, #A9C9FF 0%, #FFBBEC 100%);"> --}}
    {{-- <div class="flex justify-center items-center h-screen backgroundImage">
        <div class="w-[20rem] bg-white shadow-md rounded p-4">
            <div class="logo-section flex justify-center items-center my-4">
                <img src="{{ asset('icons/login.png') }}" alt="logo" width="50rem" height="50rem">
            </div>
            <div class="main-content">
                <form action="{{ route('login') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="my-2">
                        <label for="email"><i class="fa fa-envelope me-2 text-blue-800"></i><strong>Email
                                Address</strong></label>
                        <input class="w-full border rounded-sm p-1 outline-blue-100" type="email" name="email"
                            id="email" placeholder="johndoe@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-sm text-red-500">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="my-2">
                        <label for="password"><i class="fa fa-key me-2 text-blue-800"></i><strong>Password</strong></label>
                        <input class="w-full border rounded-sm p-1 outline-blue-100" type="password" name="password"
                            id="password" placeholder="xxxxxxxx">
                        @error('email')
                            <p class="text-sm text-red-500">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="w-full my-3">
                        <button class="w-full bg-blue-200 text-blue-700 rounded-sm py-1 hover:shadow-sm" type="submit">
                            <i class="fa fa-sign-in"></i>
                            <span class="font-bold">Login</span>
                        </button>
                    </div>
                    <div class="w-full my-3">
                        <a href="{{ route('home') }}"
                            class="w-full text-center block bg-red-200 text-red-700 rounded-sm py-1 hover:shadow-sm">
                            <i class="fa fa-backward"></i>
                            <span class="font-bold">Back</span>
                        </a>
                    </div>
                    <div class="text-blue-500 text-sm text-center py-3">
                        <a href="{{ route('student.registration') }}">New User? <span>Register here</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="flex justify-center items-center h-screen ">
        <div class="w-[60rem] h-full md:h-auto flex flex-wrap justify-center bg-white shadow-md rounded-md">
            <div class="hidden md:w-1/2 md:border-e md:p-10 md:flex md:justify-center md:items-center">
                <img src="{{ asset('images/auth/login_image.jpg') }}" alt="logo" width="100%" height="100%">
            </div>
            <div class="w-full md:w-1/2 p-5">
                <div class="border-b mb-3">
                    <h3 class="text-3xl text-blue-700 font-bold py-3 text-center">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login
                    </h3>
                    <p class="text-lg text-gray-600 font-bold pb-2 text-center">Explore EDORB</p>
                </div>
                <div>
                    <form action="{{ route('login') }}" method="POST" autocomplete="off" class="flex flex-col">
                        @csrf
                        <label class="text-lg text-blue-700 font-bold mb-2" for="email">
                            <i class="fa-solid fa-envelope me-2"></i>
                            Email
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="email"
                            name="email" id="email" placeholder="Example@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-sm text-red-700 mb-3">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
    
                        <label class="text-lg text-blue-700 font-bold mb-2" for="password">
                            <i class="fa-solid fa-lock me-2"></i>
                            Password
                        </label>
                        <input class="w-full bg-gray-50 py-2 px-3 shadow-sm rounded-md mb-3 focus:outline-none" type="password"
                            name="password" id="password" placeholder="************">
                        @error('password')
                            <p class="text-sm text-red-700 mb-3">
                                <i class="fa fa-warning mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
    
    
                        <button class="bg-blue-700 text-white py-2 rounded-full my-3 hover:bg-blue-800" type="submit"
                            name="login"><i class="fa-solid fa-key me-2"></i>Login</button>
                    </form>
    
                    <div class="mb-5 text-center">
                        <span>Do not have an account? <a class="text-blue-700"
                                href="{{ route('register') }}">Register here</a></span>
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
