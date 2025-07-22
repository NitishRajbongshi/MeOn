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

    <div class="container mx-auto px-4 py-12">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-indigo-800 mb-4">Explore Our Courses</h1>
            <div class="w-24 h-1.5 gradient-bg mx-auto rounded-full"></div>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                Discover comprehensive learning resources tailored for your academic success
            </p>
        </div>

        <!-- Course Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($categories as $category)
                @php
                    $randomNumber = rand(1, 7);
                @endphp
                <div
                    class="bg-white rounded-xl shadow-md overflow-hidden card-hover transition duration-300 transform hover:-translate-y-1">
                    <!-- Course Image -->
                    <div class="h-48 w-full overflow-hidden">
                        <img src="{{ asset('images/classHeader/header_' . $randomNumber . '.jpg') }}"
                            alt="{{ $category->title }}"
                            class="w-full h-full object-cover transition duration-500 hover:scale-105">
                    </div>

                    <!-- Course Content -->
                    <div class="p-6">
                        <!-- Tags -->
                        <div class="mb-3 flex flex-wrap gap-2">
                            <x-class-tags :tagsCsv="$category->tags" />
                        </div>

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $category->category }}</h3>

                        <!-- Description -->
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($category->title, 200) }}
                        </p>

                        <!-- Stats -->
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <div class="flex items-center mr-4">
                                <i class="fas fa-book-open mr-1 text-indigo-500"></i>
                                <span>12 Lessons</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-1 text-indigo-500"></i>
                                <span>8 Hours</span>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="mt-4">
                            <a href="{{ url('category', [$category->slug, 'all-classes']) }}" class="block">
                                <button
                                    class="w-full gradient-bg text-white py-3 px-4 rounded-lg font-medium hover:opacity-90 transition duration-300 flex items-center justify-center">
                                    <i class="fas fa-search mr-2"></i> Explore Classes
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="mt-16 text-center">
            <div class="gradient-bg text-white p-8 rounded-xl">
                <h2 class="text-2xl font-bold mb-4">Can't find what you're looking for?</h2>
                <p class="mb-6 max-w-2xl mx-auto opacity-90">
                    We're constantly adding new courses. Contact us if you have specific learning needs.
                </p>
                <button
                    class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition duration-300">
                    Request a Course
                </button>
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
