@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="min-h-screen bg-gradient-to-r from-indigo-50 to-purple-50 p-4 md:p-8">
        <div class="container mx-auto rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="gradient-bg text-white text-center py-8 px-4">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-invoice-dollar text-3xl"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold uppercase mb-2">Basic Plan</h1>
                <p class="text-lg opacity-90">Purchase individual chapter access for focused learning</p>
            </div>

            <!-- Content -->
            <div class="bg-white p-6 md:p-10">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Form Section -->
                    <div class="w-full lg:w-3/5">
                        <div class="border-b border-gray-200 pb-4 mb-6">
                            <h2 class="text-xl font-bold text-indigo-800 flex items-center">
                                <i class="fas fa-layer-group mr-3 text-indigo-500"></i>
                                Choose Your Chapter
                            </h2>
                            <p class="text-sm text-gray-500 mt-1">Select your preferred subject and chapter carefully</p>
                        </div>

                        <form
                            action="{{ URL::temporarySignedRoute('plan.purchase', now()->addMinutes(60), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                            method="post" autocomplete="off">
                            @csrf
                            <input type="hidden" id="plan_input" name="plan_code" value="1">
                            <input type="hidden" id="actual_price_input" name="actual_price">
                            <input type="hidden" id="offer_price_input" name="offer_price">

                            <!-- Class Selection -->
                            <div class="mb-6">
                                <label for="class" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Select Class
                                </label>
                                <select name="class" id="class"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300">
                                    <option value="">Choose a class</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Subject Selection -->
                            <div class="mb-6">
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Select Subject
                                </label>
                                <select name="subject" id="subject"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                    disabled>
                                    <option value="">Choose a subject</option>
                                </select>
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i> {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Chapter Selection -->
                            <div class="mb-6">
                                <label for="chapter" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="text-red-500">*</span> Select Chapter
                                </label>
                                <select name="chapter" id="chapter"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300"
                                    disabled>
                                    <option value="">Choose a chapter</option>
                                </select>
                                @error('chapter')
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
                                            <span class="font-bold">Important:</span> Choose resources carefully before
                                            purchase. The cart will show all charges and applicable prices.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="gradient-bg text-white px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300 flex items-center">
                                    <i class="fas fa-shopping-cart mr-2"></i>
                                    Purchase Now
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Cart Summary -->
                    <div class="w-full lg:w-2/5">
                        <div class="bg-white border border-gray-200 rounded-xl shadow-md p-6 sticky top-4">
                            <div class="border-b border-gray-200 pb-4 mb-4">
                                <h2 class="text-xl font-bold text-indigo-800 flex items-center">
                                    <i class="fas fa-shopping-bag mr-3 text-indigo-500"></i>
                                    Order Summary
                                </h2>
                            </div>

                            <!-- Selected Chapter -->
                            <div class="mb-6">
                                <h3 class="text-lg font-semibold text-gray-800" id="chapter_name">No chapter selected</h3>
                                <p class="text-gray-500 text-sm">Basic Plan - Single Chapter Access</p>
                                <h4 class="text-md font-bold text-slate-400">Rs. <span id="chapter_price">00.00</span></h4>
                            </div>

                            <!-- Pricing Breakdown -->
                            <div class="space-y-3 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Actual Price</span>
                                    <span class="font-medium" id="actual_price">₹00.00</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Discount</span>
                                    <span class="text-green-600 font-medium">-₹<span
                                            id="discount_amount">00.00</span></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Offer Price</span>
                                    <span class="font-medium" id="offer_price">₹00.00</span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 flex justify-between">
                                    <span class="text-gray-600">Taxes & Fees</span>
                                    <span class="font-medium">₹00.00</span>
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-800">Total Amount</span>
                                    <span class="text-2xl font-bold text-indigo-700" id="total_amount">₹00.00</span>
                                </div>
                            </div>

                            <!-- Offer Price (hidden until selection) -->
                            <div class="mt-6 bg-indigo-50 p-4 rounded-lg hidden" id="offer_price_container">
                                <div class="flex items-center">
                                    <i class="fas fa-tag text-indigo-500 mr-2"></i>
                                    <span class="text-sm font-medium text-indigo-700">
                                        Offer Price: <span class="font-bold" id="offer_price">₹00.00</span>
                                    </span>
                                </div>
                            </div>
                        </div>
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
        <script src="{{ asset('js/subscription/basic.js') }}" defer></script>
    @endpush
@endsection
