@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <x-show-notification />
    <main>
        <x-main-content>
            {{-- BreadCrumbs --}}
            <div class="w-full rounded-md text-xs">
                <ol class="list-reset flex">
                    <li>
                        <a href="#"
                            class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Dashboard</a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-500 dark:text-neutral-400">Site Settings</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h1 class="font-bold text-lg text-blue-500 py-2">Manage Site Settings</h1>
                        <div class="text-md">
                            <ul class="">
                                <li class=""><span class="font-bold">Manage Meta Data:</span> Manage your site meta
                                    data for different pages</li>
                                <li>
                                    <ol class="ml-2 text-blue-600">
                                        <li><i class="fa fa-circle-dot text-xs mr-2"></i>
                                            <a href="{{ route('manage.meta.class') }}">Manage meta data for classes</a>
                                        </li>
                                        <li><i class="fa fa-circle-dot text-xs mr-2"></i>
                                            <a href="{{ route('manage.meta.subject') }}">Manage meta data for subjects</a>
                                        </li>
                                        <li><i class="fa fa-circle-dot text-xs mr-2"></i>
                                            <a href="{{ route('manage.meta.chapter') }}">Manage meta data for chapters</a>
                                        </li>
                                        <li><i class="fa fa-circle-dot text-xs mr-2"></i>
                                            <a href="{{ route('manage.meta.note') }}">Manage meta data for notes</a>
                                        </li>
                                    </ol>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/4">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h1>SideBar</h1>
                    </div>
                </div>
            </div>
        </x-main-content>
    </main>
    @include('layouts.footer')
@endsection
