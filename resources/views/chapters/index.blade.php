@extends('layouts.app')
@section('title', $metaData->meta_title ?? 'Edorb')
@section('meta_description', $metaData->meta_description ?? 'Discover comprehensive Assamese and English notes for
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
                            <span class="text-gray-500">Chapter List</span>
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
                        <h1 class="text-2xl font-bold text-indigo-800">
                            <i class="fas fa-layer-group mr-3 text-indigo-500"></i>
                            Chapter List
                        </h1>
                    </div>

                    <!-- Subject Info -->
                    <div class="gradient-bg text-white px-8 py-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h2 class="text-xl font-bold">
                                    Showing chapters for <span class="text-indigo-100">{{ $subject->name }}</span>
                                </h2>
                                <p class="mt-2 text-indigo-100">
                                    <span class="bg-indigo-700 px-2 py-1 rounded-full text-sm">
                                        {{ $class->name }}
                                    </span>
                                </p>
                            </div>
                            <a href="{{ url('/content/subject', $class->id) }}"
                                class="mt-4 md:mt-0 text-sm bg-white text-indigo-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300">
                                Explore other chapters
                            </a>
                        </div>
                        <p class="mt-3 text-indigo-100 opacity-90">
                            All related solutions and notes are listed here. Select a chapter to access detailed materials.
                        </p>
                    </div>

                    <!-- Chapters Grid -->
                    <div class="p-2 md:p-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                            <i class="fas fa-list-ol mr-2 text-indigo-500"></i>
                            List of Chapters
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ($chapters as $chapter)
                                <div
                                    class="bg-white rounded-xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                                    <!-- Card Header -->
                                    <div class="px-6 py-5 border-b border-gray-50 flex flex-wrap gap-2 justify-between items-start">
                                        <h4 class="text-lg font-semibold text-gray-800">
                                            <i class="fas fa-bookmark text-indigo-400 mr-3"></i>
                                            {{ $chapter->name }}
                                        </h4>
                                        <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">
                                            {{ $subject->name }}
                                        </span>
                                    </div>

                                    <!-- Card Body -->
                                    <div class="px-6 py-5">
                                        <!-- Description -->
                                        <p class="text-gray-500 text-sm mb-5 line-clamp-2 leading-relaxed">
                                            {{ $chapter->description }}
                                        </p>

                                        <!-- Price & CTA -->
                                        <div class="flex justify-between items-center">
                                            @if ($chapter->master_price_status_id == '1')
                                                <span
                                                    class="bg-green-50 text-green-600 text-xs font-medium px-3 py-1 rounded-full">
                                                    <i class="fas fa-gift mr-1"></i> Free Access
                                                </span>
                                            @else
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-gray-400 line-through text-sm">
                                                        ₹{{ $chapter->actual_price }}
                                                    </span>
                                                    <span
                                                        class="bg-gradient-to-r from-pink-500 to-orange-400 text-white text-sm font-semibold px-3 py-1 rounded-full">
                                                        ₹{{ $chapter->offer_price }}
                                                    </span>
                                                </div>
                                            @endif

                                            <a href="{{ url('/notes/show', [$chapter->slug, 'all-notes']) }}"
                                                class="text-sm bg-gradient-to-r from-indigo-400 to-purple-500 text-white px-5 py-2 rounded-lg hover:shadow-lg transition duration-300 flex items-center">
                                                <i class="fas fa-book-open mr-2"></i>
                                                View Notes
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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

                    <!-- Subjects Section -->
                    <div class="gradient-bg px-6 py-4">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <i class="fas fa-book mr-3 text-indigo-200"></i>
                            Other Subjects
                        </h2>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3">
                            @foreach ($subjects as $item)
                                <li class="group">
                                    <a href="{{ url('/notes/chapter', [$item->slug, 'all-chapters']) }}"
                                        class="flex items-center px-4 py-3 bg-gray-50 rounded-lg hover:bg-indigo-50 transition duration-300">
                                        <span
                                            class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover:bg-blue-600 transition duration-300"></span>
                                        <span
                                            class="text-gray-700 font-medium group-hover:text-indigo-700 transition duration-300">{{ $item->name }}</span>
                                        <span class="ml-auto text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">
                                            {{ $item->chapters_count ?? '0' }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
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

    <script>
        // Function to generate HTML content for each object in the array
        function generateContent(note) {
            return `
                <div class="md:ms-3 my-2 text-xs border-s-2 ps-2 border-dotted border-blue-800">
                    <p class="font-bold">${note.name}</p>
                    <p>${note.description}</p>
                    <button class="viewPdfFile border text-xs border-blue-200 bg-blue-100 text-blue-800 font-bold px-1 mt-2 rounded-sm" id="noteBtn${note.id}" data-id="${note.id}">
                        <a href="/notes/viewNotes/${note.id}" class="">View Note</a>
                    </button>
                </div>
            `;
        }

        // not usefull now
        $(document).ready(function() {
            $(".noteViewBtn").on('click', function() {
                const chapterID = $(this).data('id');

                // Get CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Get all the available notes
                $.ajax({
                    url: '/notes/getNotes/' + chapterID,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        $("#" + chapterID).empty();
                        if (response.status == 'success') {
                            if (response.result.length > 0) {
                                $.each(response.result, function(index, note) {
                                    var contentToInsert = generateContent(note);
                                    // Insert the content into the specified div
                                    $("#" + chapterID).append(contentToInsert);
                                });
                            } else {
                                alert("No note available for this chapter right now!");
                            }
                        } else {
                            alert(`Failed! ${response.message}`);
                        }
                    },
                    error: function(e) {
                        console.error('AJAX error:', e);
                        alert("Server Error!");
                    }
                });
            })
        });
    </script>
@endsection
