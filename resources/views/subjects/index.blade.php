@extends('layouts.app')
@section('title', $metaData->meta_title ?? 'Edorb')
@section('meta_description',
    $metaData->meta_description ??
    'Discover comprehensive Assamese and English notes for
    classes 5 to 10 (SEBA and NCERT) and exercise solutions for class 11 and 12 science (NCERT) in physics, chemistry,
    maths, and biology at edorb.in. We also offer online coaching for JEE, CEE, NEET, NEST, and more.')
@section('content')
    @include('layouts.navbar')
    <x-show-notification />

    <main class="container mx-auto px-1 py-2 md:px-4 md:py-8 min-h-[80%]">
        <!-- Breadcrumbs -->
        <div class="w-full rounded-md text-sm mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-500">Subject List</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Main Content -->
            <div class="w-full lg:w-3/4">
                <div class="border bg-white rounded-xl shadow-md overflow-hidden">
                    <!-- Header -->
                    <div class="border-b border-gray-100 px-8 py-5">
                        <div class="flex flex-wrap gap-3 justify-between items-center">
                            <h1 class="text-2xl font-bold text-indigo-800">
                                <i class="fas fa-layer-group mr-3 text-indigo-500"></i>
                                Subject List
                            </h1>
                            <div class="lg:hidden">
                                <a href="#classContainer"
                                    class="text-sm bg-indigo-50 text-indigo-600 px-4 py-2 rounded-full hover:bg-indigo-100 transition duration-300">
                                    <i class="fas fa-list mr-1"></i> View Categories
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Class Info -->
                    <div class="gradient-bg text-white px-8 py-6">
                        <h2 class="text-2xl font-bold">
                            {{ $currentClass->name }} <span class="text-indigo-100 opacity-90">({{ $subjectCount }} Subjects
                                Available)</span>
                        </h2>
                        <div class="mt-3">
                            <p class="text-indigo-100">{{ $currentClass->description }}</p>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <x-class-tags :tagsCsv="$currentClass->tags" />
                        </div>
                    </div>

                    <!-- Subjects Grid -->
                    <div class="p-2 md:p-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($subjects as $item)
                            <div
                                class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                                <!-- Card Header -->
                                <div class="px-6 py-5 border-b border-gray-50 flex justify-between items-start">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        <i class="fas fa-circle-dot text-indigo-400 mr-3"></i>
                                        {{ $item->name }}
                                    </h3>
                                    <span class="text-xs bg-indigo-50 text-indigo-600 px-2 py-1 rounded-full">
                                        {{ $currentClass->name }}
                                    </span>
                                </div>

                                <!-- Card Body -->
                                <div class="px-6 py-5">
                                    <!-- Tags -->
                                    <div class="mb-4 flex flex-wrap gap-2">
                                        <x-ass-subject-tags :tagsCsv="$item->tags" :routeParam="['standard' => $currentClass->slug]" />
                                    </div>

                                    <!-- Description -->
                                    <p class="text-gray-500 text-sm mb-5 line-clamp-3 leading-relaxed">
                                        {{ $item->description }}
                                    </p>

                                    <!-- Price & CTA -->
                                    <div class="flex justify-between items-center">
                                        @if ($item->master_price_status_id == '1')
                                            <span
                                                class="bg-green-50 text-green-600 text-xs font-medium px-3 py-1 rounded-full">
                                                <i class="fas fa-gift mr-1"></i> Free Access
                                            </span>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <span class="text-gray-400 line-through text-sm">
                                                    ₹{{ $item->actual_price }}
                                                </span>
                                                <span
                                                    class="bg-gradient-to-r from-pink-500 to-orange-400 text-white text-sm font-semibold px-3 py-1 rounded-full">
                                                    ₹{{ $item->offer_price }}
                                                </span>
                                            </div>
                                        @endif

                                        <div class="flex items-center space-x-2">
                                            @auth
                                                @if ($user->admin)
                                                    <form action="{{ route('subject.delete') }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="subjectID" value="{{ $item->id }}">
                                                        <button type="submit"
                                                            class="text-gray-400 hover:text-red-500 transition duration-300 p-2"
                                                            onclick="return confirm('Are you sure you want to delete this class and related resources?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth

                                            <a href="{{ url('/notes/chapter', [$item->slug, 'all-chapters']) }}"
                                                class="text-sm bg-gradient-to-r from-indigo-400 to-purple-500 text-white px-5 py-2 rounded-lg hover:shadow-lg transition duration-300 flex items-center">
                                                <i class="fas fa-arrow-right mr-2"></i>
                                                Chapters
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/4" id="classContainer">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden sticky top-4 border border-gray-100">
                    <!-- Categories Section -->
                    <div class="gradient-bg px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i class="fas fa-folder-open mr-3 text-indigo-200"></i>
                            Available Categories
                        </h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3">
                            @foreach ($categories as $item)
                                <li class="group">
                                    <a href="{{ url('category', [$item->slug, 'all-classes']) }}"
                                        class="flex items-center px-4 py-3 bg-gray-50 rounded-lg hover:bg-indigo-50 transition duration-300">
                                        <span
                                            class="w-2 h-2 bg-indigo-500 rounded-full mr-3 group-hover:bg-indigo-600 transition duration-300"></span>
                                        <span
                                            class="text-gray-700 font-medium group-hover:text-indigo-700 transition duration-300">{{ $item->category }}</span>
                                        <span class="ml-auto text-xs bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">
                                            {{ $item->classes_count ?? '0' }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Classes Section -->
                    <div class="gradient-bg px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i class="fas fa-graduation-cap mr-3 text-indigo-200"></i>
                            Available Classes
                        </h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3">
                            @foreach ($classes as $item)
                                <li class="group">
                                    <a href="{{ url('content/subject', [$item->slug, 'language', 'all-languages']) }}"
                                        class="flex items-center px-4 py-3 bg-gray-50 rounded-lg hover:bg-indigo-50 transition duration-300">
                                        <span
                                            class="w-2 h-2 bg-purple-500 rounded-full mr-3 group-hover:bg-purple-600 transition duration-300"></span>
                                        <span
                                            class="text-gray-700 font-medium group-hover:text-indigo-700 transition duration-300">{{ $item->name }}</span>
                                        <span class="ml-auto text-xs bg-purple-100 text-purple-700 px-2 py-1 rounded-full">
                                            {{ $item->subjects_count ?? '0' }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Quick Links -->
                    <div class="border-t border-gray-100 px-6 py-4">
                        <h2 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-bolt mr-2 text-yellow-500"></i>
                            Quick Links
                        </h2>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="#"
                                class="text-sm bg-indigo-50 text-indigo-700 px-3 py-2 rounded-lg hover:bg-indigo-100 transition duration-300 flex items-center">
                                <i class="fas fa-star mr-2 text-yellow-500"></i>
                                Popular
                            </a>
                            <a href="#"
                                class="text-sm bg-green-50 text-green-700 px-3 py-2 rounded-lg hover:bg-green-100 transition duration-300 flex items-center">
                                <i class="fas fa-fire mr-2 text-red-500"></i>
                                Trending
                            </a>
                            <a href="#"
                                class="text-sm bg-blue-50 text-blue-700 px-3 py-2 rounded-lg hover:bg-blue-100 transition duration-300 flex items-center">
                                <i class="fas fa-clock mr-2 text-blue-500"></i>
                                Recent
                            </a>
                            <a href="#"
                                class="text-sm bg-purple-50 text-purple-700 px-3 py-2 rounded-lg hover:bg-purple-100 transition duration-300 flex items-center">
                                <i class="fas fa-trophy mr-2 text-purple-500"></i>
                                Top Rated
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
@endsection
