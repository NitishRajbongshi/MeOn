@extends('layouts.app')

@section('content')
    <x-show-notification />
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Left Side - Image -->
            <div class="hidden md:block md:w-1/2 bg-indigo-600 p-8 items-center justify-center">
                <div class="text-center text-white">
                    <img src="{{ asset('images/auth/registration_image.png') }}" alt="Join Edorb"
                        class="w-full h-auto rounded-lg shadow-lg mb-6">
                    <h2 class="text-2xl font-bold mb-2">Join Our Learning Community</h2>
                    <p class="opacity-90">Create your account to access personalized learning resources and track your
                        progress.</p>
                    <div class="mt-6 flex justify-center space-x-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-book text-xl"></i>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-chart-line text-xl"></i>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center">
                            <i class="fas fa-trophy text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Registration Form -->
            <div class="w-full md:w-1/2 p-8 md:p-10">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-indigo-800 mb-2">Create Your Account</h1>
                    <p class="text-gray-600">Fill in your details to get started</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Full Name
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                placeholder="John Doe" required>
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

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

                    <!-- Phone Field -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Phone Number
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                placeholder="9876543210" pattern="[0-9]{10}" maxlength="10" minlength="10" required>
                        </div>
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
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

                    <!-- Confirm Password Field -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" required>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-medium text-gray-700">
                                I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-800">Terms of
                                    Service</a> and <a href="#"
                                    class="text-indigo-600 hover:text-indigo-800">Privacy Policy</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-semibold hover:opacity-90 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-user-plus mr-2"></i> Create Account
                    </button>
                </form>

                <!-- Divider -->
                <div class="my-6 relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Already have an account?</span>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">
                        <i class="fas fa-sign-in-alt mr-1"></i> Sign in to your account
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
