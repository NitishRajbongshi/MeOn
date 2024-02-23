@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <x-show-notification />


    <main class="container mx-auto ">
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
                <li class="text-neutral-500 dark:text-neutral-400">View Notes</li>
            </ol>
        </div>

        <div class="flex gap-2 my-2 ">
            {{-- content --}}
            <div class="w-full md:w-3/4 shadow-sm bg-white">
                {{-- Chpater section --}}
                <div class="chapter_list px-4">
                    <div class="border-b my-3 font-bold">
                        <h1 class="text-xl">
                            <i class="fa fa-list mr-1 text-sm"></i>
                            View Notes
                        </h1>
                    </div>
                    <div>
                        <h1 class="font-bold text-xl">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                            {{ $note['name'] }}
                        </h1>
                        <p class="my-2 text-md text-slate-600">{{ $note['description'] }}</p>
                    </div>

                    @if ($note->resources->count() > 0)
                        <div class="row my-2">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($note->resources as $resource)
                                <div class="col-md-12 mb-3">
                                    <p class="text-blue-500">Page {{$i}}</p>
                                    <img class="w-full h-auto border shadow-sm" 
                                    src="{{ asset('storage/'. $resource->img_path) }}" alt="Image" >
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>
                    @else
                        <p>No images available right now</p>
                    @endif
                </div>
            </div>
            {{-- sidebar --}}
            <div class="hidden md:block md:w-1/4 px-4 shadow-sm bg-white">
                <div class="notification_list ">
                    <div class="text-xl border-b my-3 font-bold">
                        <p>
                            <i class="fa fa-bell text-sm"></i>
                            Recent Update
                        </p>

                    </div>
                    <div>
                        <ul>
                            <li>
                                <i class="fa fa-angle-right mr-1 text-red-600" aria-hidden="true"></i>
                                New Notes Uploaded
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
