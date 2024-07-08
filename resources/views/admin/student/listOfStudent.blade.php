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
                    <li class="text-neutral-500 dark:text-neutral-400">Student Database</li>
                </ol>
            </div>
            <div class="studentTab flex flex-wrap gap-1">
                <div class="my-1 text-md">
                    <span class="border p-1 font-bold text-blue-900 border-blue-900 bg-blue-200">
                        <a href="#">
                            List of all Students
                        </a>
                    </span>
                </div>
                <div class="my-1 text-md">
                    <span class="border p-1 font-bold text-blue-900 border-blue-900 bg-blue-200">
                        <a href="#">
                            Active Student List
                        </a>
                    </span>
                </div>
                <div class="my-1 text-md">
                    <span class="border p-1 font-bold text-blue-900 border-blue-900 bg-blue-200">
                        <a href="#">
                            Class-wise Student List
                        </a>
                    </span>
                </div>
            </div>
            {{-- Data table --}}
            <div class="border rounded-md mt-2">
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
                                            <th scope="col" class="px-6 py-1 text-center">Status</th>
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
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    @if ($item->active === 0)
                                                        <span class="text-red-500">Pending</span>
                                                    @else
                                                    <span class="text-green-500">Activated</span>
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <button class="openModal" data-id="{{ $item->id }}">
                                                        <i class="fa fa-eye text-xs"></i>
                                                    </button>
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
        @include('layouts.modal-layout')
        @include('layouts.success-modal')
        @include('layouts.failed-modal')
    </main>
    @include('layouts.footer')
    @push('scripts')
        
    @endpush
@endsection
