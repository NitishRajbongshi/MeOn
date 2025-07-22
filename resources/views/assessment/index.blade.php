@extends('layouts.app')
@section('title', 'Online Assessments')
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
        <!-- Breadcrumbs -->
        <div class="w-full rounded-md text-sm mb-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                            <i class="fas fa-home mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-500">Online Assessments</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-indigo-800 mb-4">Online Assessments</h1>
            <div class="w-24 h-1.5 gradient-bg mx-auto rounded-full"></div>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                Participate and test yourself with our free online assessments to track your progress
            </p>
        </div>

        <!-- Assessments Table -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Table Header -->
            <div class="gradient-bg text-white px-6 py-4">
                <h2 class="text-xl font-bold flex items-center">
                    <i class="fas fa-clipboard-list mr-3"></i>
                    Available Examinations
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700">
                            <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">
                                Sl. No.
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium uppercase tracking-wider">
                                Exam Title
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">
                                Exam Status
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($assessments as $index => $assessment)
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ ++$index }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $assessment->title }}</div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($assessment->status_id === 1)
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i> Upcoming
                                        </span>
                                    @endif
                                    @if ($assessment->status_id === 2)
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> Open
                                        </span>
                                    @endif
                                    @if ($assessment->status_id === 3)
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i> Expired
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    @if ($assessment->status_id === 2)
                                        <a href="{{ $assessment->link }}" class="text-indigo-600 hover:text-indigo-900">
                                            <button
                                                class="gradient-bg text-white px-4 py-2 rounded-lg hover:opacity-90 transition duration-300 flex items-center mx-auto">
                                                <i class="fas fa-external-link-alt mr-2"></i>
                                                Start Exam
                                            </button>
                                        </a>
                                    @else
                                        <button
                                            class="bg-gray-200 text-gray-600 px-4 py-2 rounded-lg cursor-not-allowed flex items-center mx-auto"
                                            disabled>
                                            <i class="fas fa-lock mr-2"></i>
                                            Not Available
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $assessments->links() }}
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-12 text-center">
            <div class="gradient-bg text-white p-8 rounded-xl">
                <h2 class="text-2xl font-bold mb-4">Want to create custom assessments?</h2>
                <p class="mb-6 max-w-2xl mx-auto opacity-90">
                    Contact us to create personalized assessments tailored to your learning needs.
                </p>
                <button
                    class="bg-white text-indigo-700 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition duration-300">
                    Request Custom Assessment
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
