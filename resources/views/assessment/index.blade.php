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
    <div class="container mx-auto">
        <div class="p-1 md:p-4 w-full rounded-md text-xs">
            <ol class="list-reset flex">
                <li>
                    <a href="{{ route('home') }}"
                        class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Home</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
                <li class="text-neutral-500 dark:text-neutral-400">Online Assessments</li>
            </ol>
        </div>

        <div class="p-1 md:p-4">
            <h1 class="text-center text-3xl font-bold pb-4">Online Assessments</h1>
            <div class="w-full text-center">
                <h3 class="text-lg font-semibold ml-3 text-slate-800">List of available examination</h3>
                <p class="text-slate-500 mb-5 ml-3">Participate and test yourself with our free of cost online assessement and improve yourself</p>
            </div>
            <div
                class="relative flex flex-col w-full h-full overflow-auto text-gray-700 bg-white shadow-sm rounded-lg bg-clip-border">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr class="text-center">
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    Sl. No.
                                </p>
                            </th>
                            <th class="text-start p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    Exam Title
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    Exam Status
                                </p>
                            </th>
                            <th class="p-4 border-b border-slate-300 bg-slate-50">
                                <p class="block text-sm font-normal leading-none text-slate-500">
                                    Action
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $index => $assessment)
                            <tr class="text-center hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ ++$index }}
                                    </p>
                                </td>
                                <td class="text-start p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        {{ $assessment->title }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        @if ($assessment->status_id === 1)
                                            <span class="text-xs bg-gray-800 text-white p-1 border-gray-800 rounded-sm">
                                                Upcoming
                                            </span>
                                        @endif
                                        @if ($assessment->status_id === 2)
                                            <span class="text-xs bg-green-800 text-white p-1 border-green-800 rounded-sm">
                                                Open
                                            </span>
                                        @endif
                                        @if ($assessment->status_id === 3)
                                            <span class="text-xs bg-red-800 text-white p-1 border-red-800 rounded-sm">
                                                Expired
                                            </span>
                                        @endif
                                    </p>
                                </td>
                                <td class="p-4 border-b border-slate-200">
                                    <p class="block text-sm text-slate-800">
                                        @if ($assessment->status_id === 2)
                                            <a class="text-blue-500 rounded" href="{{ $assessment->link }}">
                                                <button
                                                    class="btn btn-sm bg-blue-500 text-white hover:bg-blue-600 px-2 py-1 rounded-full">
                                                    Click Here
                                                </button>
                                            </a>
                                        @else
                                            <a class="text-blue-500 rounded" href="#">
                                                <button
                                                    class="btn btn-sm bg-red-500 text-white hover:bg-red-600 px-2 py-1 rounded-full">
                                                    Not Available
                                                </button>
                                            </a>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-1">
                    {{ $assessments->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')

    @push('styles')
    @endpush

    @push('scripts')
    @endpush
@endsection
