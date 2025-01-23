@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <x-show-notification />
    <main>
        <x-main-content>
            {{-- BreadCrumbs --}}
            <div class="w-full rounded-md text-xs mb-2">
                <ol class="list-reset flex">
                    <li>
                        <a href="#"
                            class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Dashboard</a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-500 dark:text-neutral-400">Student Details</li>
                </ol>
            </div>

            <div>
                <div class="my-2">
                    <p class="font-bold text-md">Personal Details:</p>
                </div>
                <div class="flex flex-wrap justify-between items-start px-1 md:px-4 border rounded shadow-sm text-md">
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Name</p>
                        </div>
                        <div>
                            <strong>{{ $student->name }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Father's Name</p>
                        </div>
                        <div>
                            <strong>{{ $student->father_name }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Mother's Name</p>
                        </div>
                        <div>
                            <strong>{{ $student->mother_name }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>DOB</p>
                        </div>
                        <div>
                            <strong>{{ $student->dob }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Gender</p>
                        </div>
                        <div>
                            <strong>{{ $student->gender }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4">
                <div class="my-2">
                    <p class="font-bold text-md">Contact Details:</p>
                </div>
                <div class="flex flex-wrap justify-between items-start px-1 md:px-4 border rounded shadow-sm text-md">
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Email ID</p>
                        </div>
                        <div>
                            <strong>{{ $student->email }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Alternate Email ID</p>
                        </div>
                        <div>
                            <strong>{{ $student->alternate_email }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Phone Number</p>
                        </div>
                        <div>
                            <strong>{{ $student->ph_number }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>WhatsApp Number</p>
                        </div>
                        <div>
                            <strong>{{ $student->wp_number }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3">
                        <div class="text-xs font-bold">
                            <p>Address</p>
                        </div>
                        <div>
                            <strong>{{ $student->address }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4">
                <div class="my-2">
                    <p class="font-bold text-md">Educational Details:</p>
                </div>
                <div class="flex flex-wrap justify-between items-start px-1 md:px-4 border rounded shadow-sm text-md">
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>School / College Name</p>
                        </div>
                        <div>
                            <strong>{{ $student->college }}</strong>
                        </div>
                    </div>
                    <div class="w-full my-2 md:my-3 md:w-1/2">
                        <div class="text-xs font-bold">
                            <p>Class</p>
                        </div>
                        <div>
                            <strong>{{ $student->alternate_email }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </x-main-content>
        @include('layouts.success-modal')
        @include('layouts.failed-modal')
    </main>
    @include('layouts.footer')
    @push('styles')
    @endpush
@endsection
