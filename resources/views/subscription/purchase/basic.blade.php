@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="min-h-screen bg-gradient-to-r from-indigo-50 to-purple-50 p-4 md:p-8">
        <div class="container mx-auto rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="gradient-bg text-white text-center py-8 px-4">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-credit-card text-3xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold uppercase mb-2">Basic Plan Payment</h1>
                <p class="text-lg opacity-90">Complete your purchase to access premium content</p>
            </div>

            <!-- Content -->
            <div class="bg-white p-6 md:p-10">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Payment Summary -->
                    <div class="w-full lg:w-2/5">
                        <div class="bg-white border border-gray-200 rounded-xl shadow-md p-6 sticky top-4">
                            <div class="border-b border-gray-200 pb-4 mb-4">
                                <h2 class="text-xl font-bold text-indigo-800 flex items-center">
                                    <i class="fas fa-receipt mr-3 text-indigo-500"></i>
                                    Order Summary
                                </h2>
                            </div>

                            <!-- Selected Chapter -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $plan['chapter_name'] }}</h3>
                                <p class="text-gray-500 text-sm">Basic Plan - Single Chapter Access</p>
                            </div>

                            <!-- Pricing Breakdown -->
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Chapter Price</span>
                                    <span class="font-medium">₹{{ $plan['actual_price'] }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Discount</span>
                                    <span
                                        class="text-green-600 font-medium">-₹{{ number_format($plan['actual_price'] - $plan['offer_price'], 2) }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Taxes & Fees</span>
                                    <span class="font-medium">₹00.00</span>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-800">Total Amount</span>
                                    <span class="text-2xl font-bold text-indigo-700">₹{{ $plan['offer_price'] }}</span>
                                </div>
                            </div>

                            <!-- Payment QR Code -->
                            <div class="mt-8 text-center">
                                <div class="bg-white p-4 rounded-lg border border-gray-200 inline-block">
                                    <img src="{{ asset('images/payment/payment_qr.png') }}" alt="Payment QR Code"
                                        class="w-48 h-48 mx-auto">
                                </div>
                                <p class="mt-4 text-lg font-semibold text-gray-800">ankurjyoti902-6@okicici</p>
                            </div>
                        </div>
                    </div>

                    <!-- Instruction & Form -->
                    <div class="w-full lg:w-3/5">
                        <!-- Instruction Section -->
                        <div class="border-b border-gray-200 pb-4 mb-6">
                            <h2 class="text-xl font-bold text-indigo-800 flex items-center">
                                <i class="fas fa-info-circle mr-3 text-indigo-500"></i>
                                Payment Instructions
                            </h2>
                        </div>

                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg mb-6">
                            <ul class="list-disc list-inside space-y-2 text-red-700">
                                <li>Scan the QR code to make payment</li>
                                <li>Take a screenshot of your payment confirmation</li>
                                <li>Upload the screenshot to confirm your order</li>
                            </ul>
                        </div>

                        <!-- User Details -->
                        <div class="border-b border-gray-200 pb-4 mb-6">
                            <h2 class="text-xl font-bold text-indigo-800 flex items-center">
                                <i class="fas fa-user-circle mr-3 text-indigo-500"></i>
                                User Details
                            </h2>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Name</p>
                                    <p class="text-gray-800">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Email</p>
                                    <p class="text-gray-800">{{ $user->email }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Details Form -->
                        <div class="border-b border-gray-200 pb-4 mb-6">
                            <h2 class="text-xl font-bold text-indigo-800 flex items-center">
                                <i class="fas fa-shopping-bag mr-3 text-indigo-500"></i>
                                Order Details
                            </h2>
                        </div>

                        <form
                            action="{{ URL::temporarySignedRoute('plan.store', now()->addMinutes(60), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                            method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <!-- Plan Type -->
                            <div class="mb-6">
                                <label for="plan_code" class="block text-sm font-medium text-gray-700 mb-2">
                                    Plan Type <span class="text-red-500">*</span>
                                </label>
                                <select name="plan_code" id="plan_code"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300">
                                    <option value="{{ $plan['plan_code'] }}">Basic Plan</option>
                                </select>
                                @error('plan_code')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Class -->
                            <div class="mb-6">
                                <label for="class" class="block text-sm font-medium text-gray-700 mb-2">
                                    Class <span class="text-red-500">*</span>
                                </label>
                                <select name="class" id="class"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300">
                                    <option value="{{ $plan['class_code'] }}">{{ $plan['class_name'] }}</option>
                                </select>
                                @error('class')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Subject -->
                            <div class="mb-6">
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Subject <span class="text-red-500">*</span>
                                </label>
                                <select name="subject" id="subject"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300">
                                    <option value="{{ $plan['subject_code'] }}">{{ $plan['subject_name'] }}</option>
                                </select>
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Chapter -->
                            <div class="mb-6">
                                <label for="chapter" class="block text-sm font-medium text-gray-700 mb-2">
                                    Chapter <span class="text-red-500">*</span>
                                </label>
                                <select name="chapter" id="chapter"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300">
                                    <option value="{{ $plan['chapter_code'] }}">{{ $plan['chapter_name'] }}</option>
                                </select>
                                <p class="mt-2 text-sm text-gray-500">
                                    Description: {{ $plan['chapter_desc'] }}
                                </p>
                                @error('chapter')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Payment Receipt -->
                            <div class="mb-6">
                                <label for="img_file" class="block text-sm font-medium text-red-600 mb-2">
                                    Upload Payment Receipt <span class="text-red-500">*</span>
                                </label>
                                <input type="file" name="img_file[]" id="img_file" accept=".jpg, .jpeg" multiple
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300">
                                <p class="mt-2 text-sm text-gray-500">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Upload single/multiple images (JPG/JPEG only, max 5MB each)
                                </p>
                                @error('img_file')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Important Note -->
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-circle text-yellow-500"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            <span class="font-bold">Important:</span> Verify all details before confirming
                                            your order.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="gradient-bg text-white px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300 flex items-center">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Confirm Your Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @push('styles')
        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            }
        </style>
    @endpush
    @push('scripts')
    @endpush
@endsection
