@extends('layouts.app')

@section('content')
    <x-show-notification />
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Left Side - Image -->
            <div class="hidden md:block md:w-1/2 bg-indigo-600 p-8 items-center justify-center">
                <div class="text-center text-white">
                    <img src="{{ asset('images/auth/login_image.jpg') }}" alt="Welcome to Edorb"
                        class="w-full h-auto rounded-lg shadow-lg mb-6">
                    <h2 class="text-2xl font-bold mb-2">Welcome Back!</h2>
                    <p class="opacity-90">Login to access your personalized learning dashboard and continue your educational
                        journey.</p>
                    <div class="mt-6 flex justify-center space-x-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-book-open text-xl"></i>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-video text-xl"></i>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full md:w-1/2 p-8 md:p-10">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-graduate text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-indigo-800 mb-2">Login to Edorb</h1>
                    <p class="text-gray-600">Enter your credentials to access your account</p>
                </div>

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                placeholder="your@email.com" required>
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">
                                Forgot password?
                            </a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                placeholder="••••••••" required>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                </form>

                <!-- Divider -->
                <div class="my-6 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <!-- Social Login -->
                <div class="grid grid-cols-2 gap-3 mb-6">
                    <a href="#"
                        class="w-full bg-white border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-center text-gray-700 hover:bg-gray-50 transition duration-300">
                        <i class="fab fa-google text-red-500 mr-2"></i> Google
                    </a>
                    <a href="#"
                        class="w-full bg-white border border-gray-300 rounded-lg py-2 px-4 flex items-center justify-center text-gray-700 hover:bg-gray-50 transition duration-300">
                        <i class="fab fa-facebook-f text-blue-600 mr-2"></i> Facebook
                    </a>
                </div>

                <!-- Registration Link -->
                <div class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                        Create one now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
@endpush
