@extends('layouts.app')

@section('content')
    <x-show-notification />
    <div class="flex justify-center items-center h-screen">
        <div class="w-[18rem] bg-white shadow-md rounded p-4">
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
                    <div class="w-full text-center my-3 bg-red-200 text-red-700 rounded-sm py-1 hover:shadow-sm">
                        <i class="fa fa-backward"></i>
                        <span class="font-bold"><a href="{{url('/')}}">Back</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
