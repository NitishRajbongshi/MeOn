@extends('layouts.app')
@section('title', 'Welcome to Edorb')
@section('meta_description',
    'Discover comprehensive Assamese and English notes for classes 5 to 10 (SEBA and NCERT) and
    exercise solutions for class 11 and 12 science (NCERT) in physics, chemistry, maths, and biology at edorb.in. We also
    offer online coaching for JEE, CEE, NEET, NEST, and more.')
    {{-- @section('meta_keywords', $page->keywords) --}}

@section('content')
    <x-show-notification />
    @include('layouts.navbar')


    <div class="container mx-auto">
        @foreach ($classes as $item)
            <a href="{{ url('content/subject', [$item->slug, 'language', 'all-languages']) }}"></a>
        @endforeach
        @foreach ($subjects as $item)
            <a href="{{ url('/notes/chapter', [$item->slug, 'all-chapters']) }}"></a>
        @endforeach
        @foreach ($chapters as $item)
            <a href="{{ url('/notes/show', [$item->slug, 'all-notes']) }}"></a>
        @endforeach
    </div>

    <!-- Hero Section -->
    <section class="gradient-bg text-white">
        {{-- marquee --}}
        <div class="container mx-auto mb-1 text-md font-bold">
            <marquee class="marq pt-1" direction="left" loop="">
                @foreach ($marquees as $marquee)
                    <span>{{ $marquee->title }}</span>
                    <i class="fa fa-circle"></i>
                @endforeach
            </marquee>
        </div>
        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Assam's Trusted Plateform <small>for</small><br> Smart
                        Learning</h1>
                    <p class="text-xl mb-8 opacity-90">
                        Get well-structured notes (<span>Assamese</span> & <span>English</span>) chapter wise solutions,
                        online & offline coching, mock tests and previous year question papers for classes 5 to 12, CEE,
                        JEE, NEET & goverment exams all in one place.
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('course.all') }}">
                            <button
                                class="border-2 bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-md font-semibold transition duration-300">
                                Explore Courses
                            </button>
                        </a>
                        <a href="{{ route('about') }}">
                            <button
                                class="border-2 border-white text-white hover:bg-white hover:text-indigo-700 px-6 py-3 rounded-md font-semibold transition duration-300">
                                About Us
                            </button>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center">
                    <img src="{{ asset('images\hero_image.png') }}" alt="Students learning"
                        class="max-w-full h-auto md:max-w-md">
                </div>
            </div>
        </div>
    </section>
    <!-- Dropdown Section -->
    {{-- <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Find Your Perfect Course</h2>
            <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Select Category</label>
                    <select id="category"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Catergory</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="class" class="block text-sm font-medium text-gray-700 mb-2">Select Class</label>
                    <select id="class"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select a category first</option>
                        
                    </select>
                </div>
                <a href="">
                    <button
                        class="w-full gradient-bg hover:opacity-90 text-white py-3 rounded-md font-semibold transition duration-300">
                        Find Courses
                    </button>
                </a>
            </div>
        </div>
    </section> --}}
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Find Your Perfect Course</h2>
            <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
                <div class="mb-6">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Select Category</label>
                    <select id="category"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="class" class="block text-sm font-medium text-gray-700 mb-2">Select Class</label>
                    <select id="class"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select a category first</option>
                    </select>
                </div>

                <a id="find-course-link" href="#">
                    <button
                        class="w-full gradient-bg hover:opacity-90 text-white py-3 rounded-md font-semibold transition duration-300">
                        Find Courses
                    </button>
                </a>
            </div>
        </div>
    </section>

    <!-- Full Width Cards Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <!-- Card 1 -->
            <div class="bg-indigo-50 rounded-xl p-8 mb-8 card-hover transition duration-300">
                <div class="flex flex-col-reverse md:flex-row items-center">
                    <div class="py-4 md:py-0 md:w-2/3 mb-6 md:mb-0">
                        <h3 class="text-2xl font-bold text-indigo-800 mb-3">Assessment Zone</h3>
                        <p class="text-gray-700 mb-4">Edorb is offering students for multiple online assessment. Prepare
                            yourself and participate here. <br>
                            "MOCK Test, Previous Year Questions Paper & Strategy for every competitive exam."
                        </p>
                        <a href="{{ route('student.assessment') }}" target="_blank">
                            <button
                                class="gradient-bg hover:opacity-90 text-white px-6 py-2 rounded-md font-semibold transition duration-300">
                                Start Your Assessment
                            </button>
                        </a>
                    </div>
                    <div class="md:w-1/3 flex justify-center">
                        <div class="w-32 h-32 rounded-full gradient-bg flex items-center justify-center text-white">
                            <i class="fas fa-crown text-4xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-purple-50 rounded-xl p-8 card-hover transition duration-300">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-2/3 mb-6 md:mb-0">
                        <h3 class="text-2xl font-bold text-purple-800 mb-3">Premium Content</h3>
                        <p class="text-gray-700 mb-4">Unlock unlimited access to all courses, premium resources,
                            personalized learning plans, and 24/7 tutor support with our student membership plan.</p>
                        <a href="{{ route('subscription') }}" target="_blank">
                            <button
                                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-md font-semibold transition duration-300">
                                Get Your Subcription
                            </button>
                        </a>
                    </div>
                    <div class="md:w-1/3 flex justify-center">
                        <div class="w-32 h-32 rounded-full bg-purple-600 flex items-center justify-center text-white">
                            <i class="fas fa-gift text-4xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Two Column Cards Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row md:space-x-8 space-y-8 md:space-y-0">
                <!-- Card 2 -->
                <div class="md:w-1/2 bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mr-4">
                            <i class="fas fa-chalkboard-teacher text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Become an Instructor</h3>
                    </div>
                    <p class="text-gray-600 mb-6">Share your knowledge with thousands of students worldwide. Join our
                        instructor community and start creating courses today.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Flexible schedule</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Competitive earnings</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 mr-3"></i>
                            <span>Supportive community</span>
                        </li>
                    </ul>
                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md font-semibold transition duration-300">
                        Apply Now
                    </button>
                </div>
                <!-- Card 1 -->
                <div class="md:w-1/2 bg-white p-8 rounded-xl shadow-md card-hover transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <i class="fas fa-headset text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Contact Support</h3>
                    </div>
                    <p class="text-gray-600 mb-6">Our dedicated support team is available 24/7 to help with any questions
                        or issues you might have with our platform or courses.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt text-blue-500 mr-3"></i>
                            <span>+91 7002390253</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-blue-500 mr-3"></i>
                            <span>support@edorb.in</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-location text-blue-500 mr-3"></i>
                            <span>Assam, India</span>
                        </li>
                    </ul>
                    <a href="{{ route('contact.us') }}">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-semibold transition duration-300">
                            Contact Now
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
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

            .dropdown:hover .dropdown-menu {
                display: block;
            }

            /* On smaller screens, decrease text size */
            @media only screen and (max-width: 300px) {
                .text {
                    font-size: 11px
                }
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const categorySelect = document.getElementById('category');
                const classSelect = document.getElementById('class');
                const findCourseLink = document.getElementById('find-course-link');

                // Initially disable the class select and the link
                classSelect.disabled = true;
                findCourseLink.style.pointerEvents = 'none';
                findCourseLink.style.opacity = '0.6';


                categorySelect.addEventListener('change', async function() {
                    const categoryId = this.value;

                    // Reset and disable the class select and link
                    classSelect.innerHTML = '<option value="">Select a category first</option>';
                    classSelect.disabled = true;
                    findCourseLink.href = '#';
                    findCourseLink.style.pointerEvents = 'none';
                    findCourseLink.style.opacity = '0.6';


                    if (categoryId) {
                        classSelect.innerHTML = '<option value="">Loading...</option>';
                        try {
                            const response = await fetch(`/get-standards/${categoryId}`);
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            const data = await response.json();

                            classSelect.innerHTML = '<option value="">Select Class</option>';
                            data.forEach(standard => {
                                const option = document.createElement('option');
                                option.value = standard.slug;
                                option.textContent = standard.name;
                                classSelect.appendChild(option);
                            });
                            classSelect.disabled = false; // Enable the class select
                        } catch (error) {
                            console.error('Failed to load classes:', error);
                            classSelect.innerHTML = '<option value="">Failed to load classes</option>';
                        }
                    }
                });

                classSelect.addEventListener('change', function() {
                    const slug = this.value;
                    if (slug) {
                        const url = `/content/subject/${slug}/language/all-languages`;
                        findCourseLink.href = url;
                        findCourseLink.style.pointerEvents = 'auto'; // Make the link clickable
                        findCourseLink.style.opacity = '1';
                    } else {
                        findCourseLink.href = '#';
                        findCourseLink.style.pointerEvents = 'none'; // Disable click
                        findCourseLink.style.opacity = '0.6';
                    }
                });
            });
        </script>
    @endpush
@endsection
