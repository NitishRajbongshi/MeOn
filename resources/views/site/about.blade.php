@extends('layouts.app')
@section('title', 'Edorb - About Us')
@section('meta_description',
    'Welcome to our website Edorb.in, your one-stop destination for comprehensive study
    materials and solutions tailored for students from Class 5 to 10 following the SEBA & from 9 to 12 following the NCERT
    curriculum, available in both Assamese and English languages. Specifically designed for Science stream (Physics,
    Chemistry, Mathematics, Biology) students in Classes 11 and 12, our platform offers meticulously curated notes, detailed
    exercise solutions, and engaging blogs covering advanced physics topics.')
@section('meta_keywords', 'Edorb, Edorb.in, Edorb Assam, Edorb online study, Edorb Assamese Notes')
@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <div class="px-4 w-full rounded-md">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 transition duration-300">
                        <i class="fas fa-home mr-1"></i> Home
                    </a>
                </li>
                <li class="text-gray-500">
                    <i class="fas fa-chevron-right"></i>
                </li>
                <li class="text-gray-600 font-medium">About Us</li>
            </ol>
        </div>

        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-indigo-800 mb-4">About Edorb</h1>
            <div class="w-24 h-1.5 gradient-bg mx-auto rounded-full"></div>
        </div>

        <!-- Team Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
            <!-- Founder Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover transition duration-300">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/3 flex justify-center p-6">
                        <img src="{{ asset('images/profile/ankur.jpeg') }}" alt="Edorb founder and CEO"
                            class="w-40 h-40 object-cover rounded-full border-4 border-indigo-100 shadow-md">
                    </div>
                    <div class="md:w-2/3 p-6">
                        <div class="uppercase tracking-wide text-sm text-indigo-600 font-semibold mb-1">Founder and CEO
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Ankur Jyoti Rajbongshi</h3>
                        <p class="text-gray-600 mb-2">
                            <i class="fas fa-graduation-cap text-indigo-500 mr-2"></i> M.Sc. Physics
                        </p>
                        <p class="text-gray-600 mb-2">
                            <span class="font-medium text-gray-700">Specialization:</span> Condensed Matter Physics
                        </p>
                        <p class="text-gray-600">
                            <i class="fas fa-phone-alt text-indigo-500 mr-2"></i> 7002390253
                        </p>
                        <div class="mt-4 flex space-x-3">
                            <a href="#" class="text-indigo-500 hover:text-indigo-700">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="text-indigo-500 hover:text-indigo-700">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-indigo-500 hover:text-indigo-700">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- COO Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover transition duration-300">
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/3 flex justify-center p-6">
                        <img src="{{ asset('images/profile/rekha.jpeg') }}" alt="Edorb Chief Operating Officer"
                            class="w-40 h-40 object-cover rounded-full border-4 border-purple-100 shadow-md">
                    </div>
                    <div class="md:w-2/3 p-6">
                        <div class="uppercase tracking-wide text-sm text-purple-600 font-semibold mb-1">Chief Operating
                            Officer</div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Rekha Rani Bora</h3>
                        <p class="text-gray-600 mb-2">
                            <i class="fas fa-graduation-cap text-purple-500 mr-2"></i> M.Sc. Zoology
                        </p>
                        <p class="text-gray-600 mb-2">
                            <span class="font-medium text-gray-700">Specialization:</span> Fish Biology & Fishery Science
                        </p>
                        <p class="text-gray-600">
                            <i class="fas fa-phone-alt text-purple-500 mr-2"></i> 6000062706
                        </p>
                        <div class="mt-4 flex space-x-3">
                            <a href="#" class="text-purple-500 hover:text-purple-700">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="text-purple-500 hover:text-purple-700">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-purple-500 hover:text-purple-700">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="bg-white rounded-xl shadow-md p-8 mb-12">
            <div class="prose max-w-none text-gray-700">
                <p class="text-lg mb-6">
                    Welcome to <span class="font-bold text-indigo-700">Edorb.in</span>, your one-stop destination for
                    comprehensive study materials and solutions tailored for students from Class 5 to 10 following the SEBA
                    & from 9 to 12 following the NCERT curriculum, available in both Assamese and English languages.
                </p>

                <div class="bg-indigo-50 p-6 rounded-lg mb-6">
                    <h3 class="text-xl font-bold text-indigo-800 mb-3">Our Specializations</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-indigo-500 mr-2"></i> Science stream (Physics, Chemistry,
                            Mathematics, Biology)
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-indigo-500 mr-2"></i> Classes 11 and 12 advanced topics
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-indigo-500 mr-2"></i> Medical and engineering entrance exams
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-indigo-500 mr-2"></i> Bilingual content (Assamese & English)
                        </li>
                    </ul>
                </div>

                <p class="text-lg mb-6">
                    Specifically designed for Science stream students, our platform offers meticulously curated notes,
                    detailed exercise solutions, and engaging blogs covering advanced physics topics. Additionally, we
                    provide online classes and coaching for medical and engineering entrance exams (like JEE, CEE, NEET,
                    NEST, etc.), ensuring a holistic learning experience.
                </p>

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="md:w-1/2 bg-gradient-to-r from-indigo-50 to-purple-50 p-6 rounded-lg">
                        <h4 class="font-bold text-lg text-indigo-800 mb-3 flex items-center">
                            <i class="fas fa-book-open mr-2"></i> Study Resources
                        </h4>
                        <p>
                            Explore our vast collection including textbooks, video lectures, and practice exams, all
                            designed to enhance your understanding and boost your grades.
                        </p>
                    </div>
                    <div class="md:w-1/2 bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-lg">
                        <h4 class="font-bold text-lg text-purple-800 mb-3 flex items-center">
                            <i class="fas fa-chalkboard-teacher mr-2"></i> Expert Guidance
                        </h4>
                        <p>
                            Our team of experienced educators ensures you receive accurate and reliable information, making
                            learning enjoyable and effective.
                        </p>
                    </div>
                </div>

                <p class="text-lg mb-6">
                    Whether you're preparing for board exams, competitive entrance tests, or simply aiming to deepen your
                    knowledge in physics and related fields, we have the tools and support you need. Our interactive online
                    platform allows you to study at your own pace, access live classes, and interact with tutors for
                    personalized guidance.
                </p>

                <div class="gradient-bg text-white p-6 rounded-lg text-center">
                    <h3 class="text-xl font-bold mb-3">Join Our Learning Community</h3>
                    <p class="mb-4">
                        Become part of our community of motivated learners and take your academic journey to new heights.
                    </p>
                    <button
                        class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-2 rounded-md font-semibold transition duration-300">
                        Get Started Now
                    </button>
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
