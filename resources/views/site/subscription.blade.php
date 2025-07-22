@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto px-4 py-8 min-h-screen">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-indigo-800 mb-2">Choose Your Perfect Plan</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Select the plan that fits your learning needs and budget</p>
            <div class="w-24 h-1.5 gradient-bg mx-auto rounded-full mt-4"></div>
        </div>

        <!-- Pricing Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Basic Plan -->
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden card-hover transition duration-300 transform hover:-translate-y-1">
                <div class="gradient-bg text-white text-center py-6">
                    <h2 class="text-2xl font-bold">BASIC</h2>
                    <div class="flex justify-center items-end mt-4">
                        <span class="text-4xl font-bold">₹</span>
                        <span class="text-lg mb-1 ml-1">/chapter</span>
                    </div>
                </div>
                <div class="p-6 flex justify-center">
                    <img src="{{ asset('icons/piggy.png') }}" alt="Basic Plan" class="w-32 h-32 object-contain">
                </div>
                <div class="px-6 pb-6">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Chapter Access:</span>
                                <p class="text-gray-600 text-sm">Get all notes for a specific chapter.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Quick Revisions:</span>
                                <p class="text-gray-600 text-sm">Perfect for focused study before exams.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Budget-Friendly:</span>
                                <p class="text-gray-600 text-sm">Affordable option for targeted learning.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-6 bg-blue-50 p-4 rounded-lg">
                        <div class="flex items-start">
                            <i class="fas fa-question-circle text-blue-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium text-blue-700">Why Choose This?</span>
                                <p class="text-gray-700 text-sm">Ideal for mastering one chapter at a time without paying
                                    for more.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ URL::temporarySignedRoute('plan.basic', now()->addMinutes(60)) }}" class="block">
                        <button
                            class="w-full gradient-bg text-white py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                            Choose Basic Plan
                        </button>
                    </a>
                </div>
            </div>

            <!-- Standard Plan -->
            <div
                class="bg-white rounded-xl shadow-lg overflow-hidden card-hover transition duration-300 transform hover:-translate-y-1 border-2 border-purple-200 relative">
                <div class="absolute top-0 right-0 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                    POPULAR CHOICE
                </div>
                <div class="bg-purple-600 text-white text-center py-6">
                    <h2 class="text-2xl font-bold">STANDARD</h2>
                    <div class="flex justify-center items-end mt-4">
                        <span class="text-4xl font-bold">₹</span>
                        <span class="text-lg mb-1 ml-1">/subject</span>
                    </div>
                </div>
                <div class="p-6 flex justify-center">
                    <img src="{{ asset('icons/money_tree.png') }}" alt="Standard Plan" class="w-32 h-32 object-contain">
                </div>
                <div class="px-6 pb-6">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Full Subject Access:</span>
                                <p class="text-gray-600 text-sm">Unlock all chapters in one subject.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Thorough Prep:</span>
                                <p class="text-gray-600 text-sm">Great for complete understanding of a subject.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Cost-Effective:</span>
                                <p class="text-gray-600 text-sm">Access the entire subject for a reasonable price.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Mock Exams:</span>
                                <p class="text-gray-600 text-sm">Test your knowledge with subject-specific tests.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-6 bg-purple-50 p-4 rounded-lg">
                        <div class="flex items-start">
                            <i class="fas fa-question-circle text-purple-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium text-purple-700">Why Choose This?</span>
                                <p class="text-gray-700 text-sm">Perfect for students who want to excel in a specific
                                    subject with all resources in one place.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ URL::temporarySignedRoute('plan.standard', now()->addMinutes(60)) }}" class="block">
                        <button
                            class="w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition duration-300">
                            Choose Standard Plan
                        </button>
                    </a>
                </div>
            </div>

            <!-- Premium Plan -->
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden card-hover transition duration-300 transform hover:-translate-y-1">
                <div class="bg-indigo-600 text-white text-center py-6">
                    <h2 class="text-2xl font-bold">PREMIUM</h2>
                    <div class="flex justify-center items-end mt-4">
                        <span class="text-4xl font-bold">₹</span>
                        <span class="text-lg mb-1 ml-1">/Class</span>
                    </div>
                </div>
                <div class="p-6 flex justify-center">
                    <img src="{{ asset('icons/money_bag.png') }}" alt="Premium Plan" class="w-32 h-32 object-contain">
                </div>
                <div class="px-6 pb-6">
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">All Subjects:</span>
                                <p class="text-gray-600 text-sm">Get access to every subject in your class.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Total Coverage:</span>
                                <p class="text-gray-600 text-sm">Study all subjects with ease and confidence.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Best Value:</span>
                                <p class="text-gray-600 text-sm">The most comprehensive plan at the best price.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium">Full Mock Tests:</span>
                                <p class="text-gray-600 text-sm">Assess readiness across all subjects.</p>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-6 bg-indigo-50 p-4 rounded-lg">
                        <div class="flex items-start">
                            <i class="fas fa-question-circle text-indigo-500 mt-1 mr-2"></i>
                            <div>
                                <span class="font-medium text-indigo-700">Why Choose This?</span>
                                <p class="text-gray-700 text-sm">Ideal for students who want to be fully prepared across
                                    all subjects, ensuring top grades.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ URL::temporarySignedRoute('plan.premium', now()->addMinutes(60)) }}" class="block">
                        <button
                            class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-300">
                            Choose Premium Plan
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Comparison Section -->
        <div class="mt-16 bg-white rounded-xl shadow-md p-8">
            <h2 class="text-2xl font-bold text-center text-indigo-800 mb-8">Plan Comparison</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-3 px-4">Features</th>
                            <th class="text-center py-3 px-4">Basic</th>
                            <th class="text-center py-3 px-4">Standard</th>
                            <th class="text-center py-3 px-4">Premium</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">Single Chapter Access</td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">Full Subject Access</td>
                            <td class="text-center py-3 px-4 text-gray-400"><i class="fas fa-times"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">All Subjects Access</td>
                            <td class="text-center py-3 px-4 text-gray-400"><i class="fas fa-times"></i></td>
                            <td class="text-center py-3 px-4 text-gray-400"><i class="fas fa-times"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">Mock Tests</td>
                            <td class="text-center py-3 px-4 text-gray-400"><i class="fas fa-times"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4 font-medium">24/7 Support</td>
                            <td class="text-center py-3 px-4 text-gray-400"><i class="fas fa-times"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                            <td class="text-center py-3 px-4 text-green-500"><i class="fas fa-check"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FAQ Section -->
        {{-- <div class="mt-16">
            <h2 class="text-2xl font-bold text-center text-indigo-800 mb-8">Frequently Asked Questions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg text-indigo-700 mb-2">Can I upgrade my plan later?</h3>
                    <p class="text-gray-600">Yes, you can upgrade your plan at any time. The remaining value of your
                        current plan will be applied to your upgrade.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg text-indigo-700 mb-2">Is there a free trial available?</h3>
                    <p class="text-gray-600">We offer a 7-day free trial for our Premium plan so you can experience all the
                        features before committing.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg text-indigo-700 mb-2">How do I cancel my subscription?</h3>
                    <p class="text-gray-600">You can cancel anytime from your account settings. Your subscription will
                        remain active until the end of the current billing period.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="font-bold text-lg text-indigo-700 mb-2">What payment methods do you accept?</h3>
                    <p class="text-gray-600">We accept all major credit cards, debit cards, UPI, and net banking through
                        secure payment gateways.</p>
                </div>
            </div>
        </div> --}}
    </div>
    @include('layouts.footer')
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
@endsection
