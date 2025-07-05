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
                    <li class="text-neutral-500 dark:text-neutral-400">Approve New Student</li>
                </ol>
            </div>

            {{-- Heading --}}
            <div class="border border-blue-300 p-2 bg-blue-200 text-blue-700">
                <p class="text-sm font-bold">
                    <i class="fa fa-info-circle mr-1"></i>
                    List of all registered students.
                </p>
            </div>

            {{-- Data table --}}
            <div class="border mt-2">
                <div class="flex flex-col overflow-x-auto">
                    <div class="">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-1">#</th>
                                            <th scope="col" class="px-6 py-1">Name</th>
                                            <th scope="col" class="px-6 py-1">Email</th>
                                            <th scope="col" class="px-6 py-1">Phone</th>
                                            <th scope="col" class="px-6 py-1 text-center">Action</th>
                                            <th scope="col" class="px-6 py-1 text-center">View</th>
                                            <th scope="col" class="px-6 py-1 text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($students as $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-1 font-medium">{{ $i }}</td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->student->ph_number ?? 'N/A' }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    {{-- <a href="#"> --}}
                                                    <button
                                                        class="activeStudent font-bold text-xs bg-green-600 py-1 text-white px-3 hover:bg-green-800"
                                                        data-id="{{ $item->id }}">
                                                        Activate
                                                    </button>
                                                    {{-- </a> --}}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <a href="{{ route('student.view', ['student' => $item->email])}} ">
                                                        <i class="fa fa-eye text-xs"></i>
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <i class="fa fa-trash text-xs"></i>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xs my-3 p-2">
                    <span class="text-xs">
                        {{ $students->links() }}
                    </span>
                </div>
            </div>
        </x-main-content>
        @include('layouts.success-modal')
        @include('layouts.failed-modal')
    </main>
    @include('layouts.footer')
    @push('styles')
        <style>
            .swal2-confirm.custom-success-button {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
            }

            .swal2-confirm.custom-success-button:hover {
                background-color: #45a049;
            }

            .swal2-confirm.custom-failure-button {
                background-color: #af4c4c;
                color: white;
                border: none;
                padding: 10px 20px;
                font-size: 16px;
                cursor: pointer;
            }

            .swal2-confirm.custom-failure-button:hover {
                background-color: #a04545;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{ asset('js/student/index.js') }}" defer></script>
    @endpush
@endsection
