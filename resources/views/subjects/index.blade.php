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
            <div class="w-full md:w-[70%] shadow-sm bg-white border">
                {{-- Chpater section --}}
                <div class="chapter_list px-4">
                    <div class="border-b my-3 font-bold">
                        <h1 class="text-xl mb-1">
                            <i class="fa-solid fa-layer-group mr-1 text-sm"></i>
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
                    <div class="text-sm my-2 text-slate-500 text-justify">
                        <p>{{ $currentClass->description }}</p>
                        <x-class-tags :tagsCsv="$currentClass->tags" />
                    </div>
                    <div class="py-2">
                        {{-- <p class="underline text-lg text-blue-500">List of subjects:</p> --}}
                        <div class="flex justify-between items-center flex-wrap">
                            @foreach ($subjects as $item)
                                <div class="w-full my-1 md:w-[49.5%] p-4 border border-blue-100 bg-white hover:shadow-md">
                                    <div class="flex justify-between font-bold pb-2">
                                        <div class="text-sm">
                                            <i class="fa fa-circle-dot mr-1 text-blue-700"></i>
                                            {{ $item->name }}
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-sm">{{ $currentClass->name }}</p>
                                        </div>
                                    </div>
                                    <x-ass-subject-tags :tagsCsv="$item->tags" :routeParam="['standard' => $currentClass->slug]" />
                                    <div class="min-h-[5rem]">
                                        <p class="text-gray-400 max-h-[4rem] text-xs"
                                            style="overflow: hidden; text-overflow: ellipsis;">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-end flex-wrap mt-3">
                                        @auth
                                            @if ($user->admin)
                                            <div class="flex justify-center items-center pb-1">
                                                @if ($item->master_price_status_id == '1')
                                                    <p class="text-sm text-blue-500 mx-1">Free</p>
                                                @else
                                                    <p class="text-sm text-blue-500 mx-1">
                                                        <span class="font-bold text-md text-gray-400"
                                                            style="text-decoration: line-through"><i
                                                                class="fa-solid fa-indian-rupee-sign"></i>{{ $item->actual_price }}</span>
                                                        <span class="font-bold text-md text-red-600"><i
                                                                class="fa-solid fa-indian-rupee-sign"></i>{{ $item->offer_price }}</span>
                                                    </p>
                                                @endif
                                                <div>
                                                    <form action="{{ route('subject.delete') }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="subjectID"
                                                            value="{{ $item->id }}">
                                                        <button type="submit" class="rounded-full bg-red-200 px-2 py-1 text-xs text-red-500 hover:text-red-800"
                                                            onclick="return confirm('Are you sure you want to delete this class and related resources?')">
                                                            <i class="fa fa-trash text-xs"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            @endif
                                        @endauth
                                        <div class="w-full md:w-auto">
                                            <a class="inline-block w-full md:w-auto" href="{{ url('/notes/chapter', [$item->slug, 'all-chapters']) }}">
                                                <button data-id={{ $item->id }}
                                                    class="subject_btn w-full md:w-auto bg-blue-500 text-white rounded p-2 hover:bg-blue-600">
                                                    <i class="fa-solid fa-right-from-bracket"></i>
                                                    Go to chapter List
                                                </button>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- sidebar --}}
            <div class="w-full md:w-[29%] px-4 border shadow-sm bg-white" id="classContainer">
                <div class="notification_list ">
                    <div class="text-xl border-b my-3 font-bold">
                        <p>
                            <i class="fa fa-list text-sm"></i>
                            Available Categories
                        </p>
                    </div>
                    <div class="pb-2">
                        <ul>
                            @foreach ($categories as $item)
                                <li>
                                    <a href="{{ url('category', [$item->slug, 'all-classes']) }}"
                                        class="text-sm text-blue-500">
                                        <i class="fa fa-circle-dot mr-1 text-red-600" aria-hidden="true"></i>
                                        {{ $item->category }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
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
                                    <a href="{{ url('content/subject', [$item->slug, 'language', 'all-languages']) }}"
                                        class="text-sm text-blue-500">
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
