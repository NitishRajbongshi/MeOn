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
                            <span class="text-gray-500">Notes List</span>
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
                        <h1 class="text-2xl font-bold text-indigo-800 flex items-center">
                            <i class="fas fa-file-alt mr-3 text-indigo-500"></i>
                            Notes List
                        </h1>
                    </div>

                    <!-- Subject Info -->
                    <div class="gradient-bg text-white px-8 py-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h2 class="text-xl font-bold">
                                    Showing notes for <span class="text-indigo-100">Chapter Name</span>
                                </h2>
                                <p class="mt-2 text-indigo-100">
                                    <span class="bg-indigo-700 px-2 py-1 rounded-full text-sm">
                                        Class Name
                                    </span>
                                </p>
                            </div>
                            <a href="#"
                                class="mt-4 md:mt-0 text-sm bg-white text-indigo-700 px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300">
                                Explore other chapters
                            </a>
                        </div>
                        <p class="mt-3 text-indigo-100 opacity-90">
                            All related solutions and notes are listed here. Select a note to access detailed materials.
                        </p>
                    </div>

                    <!-- Notes Sections -->
                    <div class="p-2 md:p-8">
                        @if ($freeNotes->count() > 0)
                            <div class="mb-8">
                                <div class="bg-green-50 border-l-4 border-green-500 px-4 py-3 mb-4 rounded-r-lg">
                                    <h3 class="text-lg font-bold text-green-800 flex items-center">
                                        <i class="fas fa-unlock-alt mr-2"></i>
                                        Free Notes Available
                                    </h3>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach ($freeNotes as $note)
                                        <div
                                            class="bg-white rounded-xl border border-green-100 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                                            <!-- Card Header -->
                                            <div
                                                class="px-6 py-5 border-b border-green-50 flex justify-between items-start">
                                                <h4 class="text-lg font-semibold text-gray-800">
                                                    <i class="fas fa-file text-green-500 mr-3"></i>
                                                    {{ $note->name }}
                                                </h4>
                                                <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                                    Free
                                                </span>
                                            </div>

                                            <!-- Card Body -->
                                            <div class="px-6 py-5">
                                                <!-- Description -->
                                                <p class="text-gray-500 text-sm mb-5 line-clamp-2 leading-relaxed">
                                                    {{ $note->description }}
                                                </p>

                                                <!-- CTA -->
                                                <div class="flex justify-end">
                                                    <a href="{{ URL::temporarySignedRoute('view.note.free', now()->addMinutes(60), ['note' => $note->slug]) }}"
                                                        class="text-sm bg-gradient-to-r from-green-500 to-teal-400 text-white px-5 py-2 rounded-lg hover:shadow-lg transition duration-300 flex items-center">
                                                        <i class="fas fa-eye mr-2"></i>
                                                        View Notes
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($paidNotes->count() > 0)
                            <div>
                                <div class="bg-red-50 border-l-4 border-red-500 px-4 py-3 mb-4 rounded-r-lg">
                                    <h3 class="text-lg font-bold text-red-800 flex items-center">
                                        <i class="fas fa-crown mr-2"></i>
                                        Premium Notes Available
                                    </h3>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach ($paidNotes as $note)
                                        <div
                                            class="bg-white rounded-xl border border-red-100 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                                            <!-- Card Header -->
                                            <div class="px-6 py-5 border-b border-red-50 flex justify-between items-start">
                                                <h4 class="text-lg font-semibold text-gray-800">
                                                    <i class="fas fa-file-invoice-dollar text-red-500 mr-3"></i>
                                                    {{ $note->name }}
                                                </h4>
                                                <span class="text-xs bg-red-100 text-red-700 px-2 py-1 rounded-full">
                                                    Premium
                                                </span>
                                            </div>

                                            <!-- Card Body -->
                                            <div class="px-6 py-5">
                                                <!-- Description -->
                                                <p class="text-gray-500 text-sm mb-5 line-clamp-2 leading-relaxed">
                                                    {{ $note->description }}
                                                </p>

                                                <!-- CTA -->
                                                <div class="flex justify-end">
                                                    @if ($access == 0)
                                                        <a href="{{ URL::temporarySignedRoute('view.note.preview', now()->addMinutes(60), ['note' => $note->slug]) }}"
                                                            class="text-sm bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg hover:shadow-lg transition duration-300 flex items-center">
                                                            <i class="fas fa-search mr-2"></i>
                                                            Preview
                                                        </a>
                                                    @endif
                                                    @if ($access == 1)
                                                        @if (auth()->check())
                                                            <a href="{{ URL::temporarySignedRoute('view.note.premium', now()->addMinutes(60), ['note' => $note->slug, 'user' => Auth::user()->name, 'email' => Auth::user()->email]) }}"
                                                                class="text-sm bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg hover:shadow-lg transition duration-300 flex items-center">
                                                                <i class="fas fa-eye mr-2"></i>
                                                                View Notes
                                                            </a>
                                                        @else
                                                            <a href="{{ URL::temporarySignedRoute('view.note.preview', now()->addMinutes(60), ['note' => $note->slug]) }}"
                                                                class="text-sm bg-gradient-to-r from-red-500 to-pink-500 text-white px-5 py-2 rounded-lg hover:shadow-lg transition duration-300 flex items-center">
                                                                <i class="fas fa-search mr-2"></i>
                                                                Preview
                                                            </a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
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
