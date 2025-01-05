@extends('layouts.app')
@section('title', $metaData->meta_title ?? 'Edorb')
@section('meta_description', $metaData->meta_description ?? 'Discover comprehensive Assamese and English notes for classes 5 to 10 (SEBA and NCERT) and exercise solutions for class 11 and 12 science (NCERT) in physics, chemistry, maths, and biology at edorb.in. We also offer online coaching for JEE, CEE, NEET, NEST, and more.')
@section('content')
    @include('layouts.navbar')
    <x-show-notification />

    <main class="container mx-auto min-h-[80%]">
        {{-- BreadCrumbs --}}
        <div class="w-full rounded-md text-xs px-4 my-2">
            <ol class="list-reset flex">
                <li>
                    <a href="/"
                        class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Home</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
                <li class="text-neutral-500 dark:text-neutral-400">Subject List</li>
            </ol>
        </div>

        <div class="flex flex-wrap justify-between gap-1 my-2">
            {{-- content --}}
            <div class="w-full md:w-[70%] shadow-sm bg-white">
                {{-- Chpater section --}}
                <div class="chapter_list px-4">
                    <div class="border-b my-3 font-bold">
                        <h1 class="text-xl">
                            <i class="fa fa-list mr-1 text-sm"></i>
                            Subject List
                        </h1>
                    </div>
                    <div class="my-2 block md:hidden">
                        <a href="#classContainer" class="border text-sm border-red-200 p-1 text-red-500">
                            <button>View all available classes</button>
                        </a>
                    </div>
                    <div class="border border-blue-300 p-2 bg-blue-200 text-blue-700">
                        <a href="#" class="text-sm font-bold">
                            {{ $currentClass->name }} - ({{ $subjectCount }} Subjects Available)
                        </a><br>
                    </div>
                    <div class="py-2">
                        {{-- <p class="underline text-lg text-blue-500">List of subjects:</p> --}}
                        <div class="flex justify-between items-center flex-wrap">
                            @foreach ($subjects as $item)
                                <div class="w-full my-1 md:w-[49.5%] p-4 border border-blue-100 bg-white hover:shadow-md">
                                    <div class="flex justify-between font-bold pb-2">
                                        <div class="text-md">
                                            <i class="fa fa-circle-dot mr-1 text-blue-700"></i>
                                            {{ $item->name }}
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-sm">{{ $currentClass->name }}</p>
                                        </div>
                                    </div>
                                    <div class="min-h-[5rem]">
                                        <p class="text-gray-400 max-h-[4rem] text-xs"
                                            style="overflow: hidden; text-overflow: ellipsis;">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-end flex-wrap mt-3">
                                        @if ($item->master_price_status_id == '1')
                                            <p class="text-sm text-blue-500 mx-1">Free</p>
                                        @else
                                            <p class="text-sm text-blue-500 mx-1">
                                                <span class="font-bold text-md text-gray-400" style="text-decoration: line-through"><i class="fa-solid fa-indian-rupee-sign"></i>{{$item->actual_price}}</span>
                                                <span class="font-bold text-md text-red-600"><i class="fa-solid fa-indian-rupee-sign"></i>{{$item->offer_price}}</span>
                                            </p>
                                        @endif
                                        <button data-id={{ $item->id }}
                                            class="subject_btn bg-blue-500 text-white rounded py-1 px-2 hover:bg-blue-600">
                                            <a href="{{ url('/notes/chapter', [$item->slug, 'all-chapters']) }}">
                                                Go to chapter List
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- sidebar --}}
            <div class="w-full md:w-[29%] px-4 shadow-sm bg-white" id="classContainer">
                <div class="notification_list ">
                    <div class="text-xl border-b my-3 font-bold">
                        <p>
                            <i class="fa fa-list text-sm"></i>
                            Available Classes
                        </p>

                    </div>
                    <div class="pb-2">
                        <ul>
                            @foreach ($classes as $item)
                                <li>
                                    <a href="{{ url('content/subject', [$item->name, 'language', 'all-languages']) }}" class="text-sm text-blue-500">
                                        <i class="fa fa-circle-dot mr-1 text-red-600" aria-hidden="true"></i>
                                        {{ $item->name }}
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
@endsection
