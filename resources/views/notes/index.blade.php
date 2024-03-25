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
                <li class="text-neutral-500 dark:text-neutral-400">Chapter List</li>
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
                            Chapter List
                        </h1>
                    </div>
                    <div>
                        <a href="" class="text-xs">
                            {{ $class->name }}
                        </a><br>
                        <a href="#" class="text-xl font-bold">
                            {{ $subject->name }}
                        </a>
                    </div>
                    <div>
                        <p class="underline text-lg text-blue-500">List of chapters:</p>
                        <div class="md:m-2">
                            @foreach ($chapters as $chapter)
                                <div class="my-2 border-s-4 border-blue-500 ps-2">
                                    <a class="" href="#">
                                        <i class="fa fa-angle-double-right text-xs mr-1"></i>{{ $chapter->name }}
                                    </a>
                                    <p class="text-slate-500">{{ $chapter->description }}</p>
                                    <div>
                                        <a href="#"
                                            class="noteViewBtn border text-xs border-blue-200 bg-blue-100 text-blue-800 font-bold px-1 py-0.5 rounded-sm"
                                            data-id="{{ $chapter->id }}">
                                            <i class="fa fa-eye mr-1"></i>Click to view available notes
                                        </a>
                                    </div>
                                    {{-- Note container --}}
                                    <div id="{{ $chapter->id }}">
                                        {{-- / --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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

    <script>
        // Function to generate HTML content for each object in the array
        function generateContent(note) {
            return `
                <div class="md:ms-3 my-2 text-xs border-s-2 ps-2 border-dotted border-blue-800">
                    <p class="font-bold">${note.name}</p>
                    <p>${note.description}</p>
                    <button class="viewPdfFile border text-xs border-blue-200 bg-blue-100 text-blue-800 font-bold px-1 mt-2 rounded-sm" id="noteBtn${note.id}" data-id="${note.id}">
                        <a href="/notes/viewNotes/${note.id}" class="">View Note</a>
                    </button>
                </div>
            `;
        }
        $(document).ready(function() {
            $(".noteViewBtn").on('click', function() {
                const chapterID = $(this).data('id');

                // Get CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Get all the available notes
                $.ajax({
                    url: '/notes/getNotes/' + chapterID,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        $("#" + chapterID).empty();
                        if (response.status == 'success') {
                            if (response.result.length > 0) {
                                $.each(response.result, function(index, note) {
                                    var contentToInsert = generateContent(note);
                                    // Insert the content into the specified div
                                    $("#" + chapterID).append(contentToInsert);
                                });
                            } else {
                                alert("No note available for this chapter right now!");
                            }
                        } else {
                            alert(`Failed! ${response.message}`);
                        }
                    },
                    error: function(e) {
                        console.error('AJAX error:', e);
                        alert("Server Error!");
                    }
                });
            })
        });
    </script>
@endsection
