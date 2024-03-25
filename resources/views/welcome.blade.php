@extends('layouts.app')

@section('content')
    <x-show-notification />
    @include('layouts.navbar')
    <style>
        /* Slideshow container */
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }
    </style>

    {{-- marquee --}}
    <div class="mb-1 text-xs font-bold bg-gray-200">
        <marquee class="marq pt-1" direction="left" loop="">
            @foreach ($marquees as $marquee)
                <span>{{$marquee->title}}</span>
                <i class="fa fa-circle"></i>
            @endforeach
        </marquee>
    </div>

    {{-- info button --}}
    <div class="container mx-auto flex gap-1 justify-end items-center text-xs">
        <p>
            <i class="fa-solid fa-comment"></i>
            Feedback
        </p>
        <p>
            <i class="fa-solid fa-address-card"></i>
            About us
        </p>
        <p>
            <i class="fa-solid fa-phone"></i>
            contact us
        </p>
    </div>

    <!-- Slideshow container -->
    <div class="container mx-auto">
        <div class="slideshow-container w-full">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="{{ asset('images/banner1.png') }}" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="{{ asset('images/banner2.png') }}" style="width:100%">
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="{{ asset('images/banner1.png') }}" style="width:100%">
            </div>
        </div>
    </div>

    <main class="container mx-auto flex gap-2 min-h-[90vh]">
        {{-- content --}}
        <div class="w-full md:w-3/4">
            {{-- Exam Link --}}
            <div class="available_class px-1 md:px-4">
                <div class="text-xl border-b my-3">
                    <span class="font-bold">
                        <i class="fa fa-list text-sm mr-1"></i>
                        Exam Links
                    </span>
                </div>
                <div class="px-1 py-2 text-sm bg-white rounded shadow-sm">
                    @if ($examLinks->count() == 0)
                        <p class="p-1">
                            <i class="fa fa-smile" aria-hidden="true"></i>
                            No exam link uploaded yet!
                        </p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <th class="border-b px-4 py-2">Exam Title</th>
                                <th class="border-b px-4 py-2">Exam Link</th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($examLinks as $examLink)
                                    <tr>
                                        <td class="border-b px-1 md:px-4 py-2">
                                            <span class="font-bold">
                                                {{ $i }} :
                                            </span>
                                            {{ $examLink->title }}
                                            @if ($examLink->status_id === 1)
                                                <span class="text-xs bg-gray-500 text-white p-1 border-gray-800 rounded-sm">
                                                    Upcoming
                                                </span>
                                            @endif
                                            @if ($examLink->status_id === 2)
                                                <span
                                                    class="text-xs bg-green-500 text-white p-1 border-green-800 rounded-sm">
                                                    Open
                                                </span>
                                            @endif
                                            @if ($examLink->status_id === 3)
                                                <span class="text-xs bg-red-500 text-white p-1 border-red-800 rounded-sm">
                                                    Expired
                                                </span>
                                            @endif
                                        </td>
                                        <td class="border-b px-4 py-2 text-center">
                                            @if ($examLink->status_id === 2)
                                                <a class="text-blue-500 p-1 rounded" href="{{ $examLink->link }}">
                                                    Click Here
                                                </a>
                                            @else
                                                <p>Not Avaiable</p>
                                            @endif
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="my-1">
                            {{ $examLinks->links() }}
                        </div>
                    @endif

                </div>
            </div>
            {{-- Class section --}}
            <div class="available_class px-1 md:px-4">
                <div class="text-xl border-b my-3">
                    <span class="font-bold">
                        <i class="fa fa-list text-sm mr-1"></i>
                        List of Classes
                    </span>
                </div>
                <div class="flex items-start flex-wrap justify-start gap-1 md:gap-3 my-2">
                    @foreach ($classes as $item)
                        <button
                            class="class_btn bg-white rounded-lg outline-none shadow-md flex flex-col items-center w-[49%] md:w-[31%] lg:w-[18.9%] h-36 px-5 py-2 justify-center hover:shadow-xl"
                            data-id="{{ $item->id }}">
                            <div class="bg-green-100 p-5 rounded-full flex justify-center items-center">
                                <i class="fa fa-book text-green-900"></i>
                            </div>
                            <div class="text-sm my-1">
                                <p class="font-bold">
                                    {{ $item->name }}
                                </p>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- sidebar --}}
        <div class="hidden md:block md:w-1/4 px-4">
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
        {{-- modal for showing the subject list --}}
        <div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 items-center justify-center">
            <div class="bg-white p-4 rounded-md w-[22rem] md:w-[36rem]">
                <div class="flex justify-between mt-2 mb-3 border-b pb-1">
                    <div>
                        <span class="rounded-sm text-md p-1 font-bold  text-blue-900">
                            <i class="fa fa-list text-md mr-1" aria-hidden="true"></i>
                            Avaiable Subjects
                        </span>
                    </div>
                    <div>
                        <button id="closeModal" class="">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                {{-- Loop the available subjects --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-2" id="avaible_class_list">
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
    <script>
        $(document).ready(() => {
            // Function to create a subject card
            function createSubjectCard(data) {
                return $('<button>', {
                    class: 'subject_btn',
                    'data-id': data.id,
                    html: $('<div>', {
                        class: 'bg-white rounded-lg outline-none shadow-md flex flex-col items-center h-36 px-5 py-2 justify-center hover:shadow-xl',
                        html: [
                            $('<div>', {
                                class: 'bg-green-100 p-5 rounded-full flex justify-center items-center',
                                html: $('<i>', {
                                    class: 'fa fa-book text-green-900'
                                })
                            }),
                            $('<div>', {
                                class: 'text-sm font-bold my-1',
                                html: $('<p>', {
                                    text: data.name
                                })
                            })
                        ]
                    })
                });
            }

            $('.class_btn').on('click', function() {
                const id = $(this).data('id');

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // getting the available subjects
                $.ajax({
                    url: '/getSubjectList/' + id,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        $('#avaible_class_list').empty();

                        // Append subject list to the container
                        var container = $('#avaible_class_list');
                        response.result.forEach(function(data) {
                            var button = createSubjectCard(data);
                            container.append(button);
                        });

                        // show the modal
                        $('#modal').removeClass('hidden');
                        $('#modal').addClass('flex');

                        container.on('click', '.subject_btn', function() {
                            var subject_id = $(this).data('id');
                            window.location.href = '/notes/subject/' + subject_id;
                        });
                    },
                    error: function(response) {
                        alert('Failed to get the subject list');
                    }
                });

                $('#closeModal').on('click', function() {
                    $('#modal').removeClass('flex');
                    $('#modal').addClass('hidden');
                });

            })
        })


        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>
@endsection
