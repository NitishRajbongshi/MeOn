@extends('layouts.app')

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
                <li class="text-neutral-500 dark:text-neutral-400">Notes List</li>
            </ol>
        </div>

        <div class="flex flex-wrap justify-between gap-1 my-2">
            <div class="w-full md:w-[70%] shadow-sm bg-white">
                {{-- Chpater section --}}
                <div class="chapter_list px-4">
                    <div class="border-b my-3 font-bold">
                        <h1 class="text-xl">
                            <i class="fa fa-list mr-1 text-sm"></i>
                            Notes List
                        </h1>
                    </div>
                    <div class="font-bold border border-blue-300 p-2 bg-blue-200 text-blue-700">
                        Showing available chapters for
                        <span class="text-blue-800">Name</span>
                        <span class="text-red-500 font-bold p-1">
                            Class Name
                        </span>
                    </div>
                    <div class="text-justify my-2">
                        <p>All related solutions and notes are listed here related to <span
                                class="font-bold">Name</span>. You can easily get the notes by selecting a
                            specific topic or chapter from the list provided below.</p>
                    </div>
                    <div>
                        <a href="#" class="text-sm text-blue-500 underline">
                            Click here to explore other chapters available for Name
                        </a>
                    </div>
                    <div>
                        <p class="underline text-lg text-blue-500">List of chapters:</p>
                        <div class="flex justify-between items-center flex-wrap">
                            @foreach ($notes as $note)
                                <div class="w-full my-1 md:w-[49.5%] p-4 border border-blue-100 bg-white hover:shadow-md">
                                    <div class="flex justify-between font-bold pb-2">
                                        <div class="text-md">
                                            <i class="fa fa-circle-dot mr-1 text-blue-700"></i>
                                            {{ $note->name }}
                                        </div>
                                        {{-- <div>
                                            <p class="text-gray-500 text-sm">{{ $subject->name }}</p>
                                        </div> --}}
                                    </div>
                                    <div class="min-h-[5rem]">
                                        <p class="text-gray-400 max-h-[4rem] text-xs"
                                            style="overflow: hidden; text-overflow: ellipsis;">
                                            {{ $note->description }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between items-end flex-wrap mt-3">
                                        <p class="text-xs text-blue-500">Free</p>
                                        <a href="{{ url('/notes/viewNotes', $note->name) }}">
                                            <button data-id={{ $note->id }}
                                                class="subject_btn bg-blue-500 text-white rounded py-1 px-2 hover:bg-blue-600">
                                                View Notes
                                            </button>
                                        </a>
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
                                    <a href="{{ route('subjectList', [$item->id]) }}" class="text-sm text-blue-500">
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
