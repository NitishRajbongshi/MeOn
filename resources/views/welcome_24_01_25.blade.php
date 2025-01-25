@extends('layouts.app')
@section('title', 'Welcome to Edorb')
@section('meta_description',
    'Discover comprehensive Assamese and English notes for classes 5 to 10 (SEBA and NCERT) and
    exercise solutions for class 11 and 12 science (NCERT) in physics, chemistry, maths, and biology at edorb.in. We also
    offer online coaching for JEE, CEE, NEET, NEST, and more.')
    {{-- @section('meta_keywords', $page->keywords) --}}

@section('content')
    <x-show-notification />
    @include('layouts.navbar')

    {{-- marquee --}}
    <div class="container mx-auto mb-1 text-md font-bold">
        <marquee class="marq pt-1" direction="left" loop="">
            @foreach ($marquees as $marquee)
                <span>{{ $marquee->title }}</span>
                <i class="fa fa-circle"></i>
            @endforeach
        </marquee>
    </div>

    {{-- info button --}}
    {{-- <div class="container mx-auto flex gap-1 justify-end items-center text-xs">
        <p class="border border-blue-200 p-1 hover:bg-blue-500 hover:text-white hover:font-bold hover:cursor-pointer">
            <a href="#">
                <i class="fa-solid fa-comment"></i>
                Feedback
            </a>
        </p>
        <p class="border border-blue-200 p-1 hover:bg-blue-500 hover:text-white hover:font-bold hover:cursor-pointer">
            <a href="{{ route('about') }}">
                <i class="fa-solid fa-address-card"></i>
                About us
            </a>
        </p>
        <p class="border border-blue-200 p-1 hover:bg-blue-500 hover:text-white hover:font-bold hover:cursor-pointer">
            <a href="{{ route('contact.us') }}">
                <i class="fa-solid fa-phone"></i>
                contact us
            </a>
        </p>
    </div> --}}
    <div class="pt-24 container mx-auto">
        <div class="container flex flex-col flex-wrap items-center px-3 mx-auto md:flex-row">
            <!--Left Col-->
            <div class="flex flex-col items-start justify-center w-full text-center md:w-2/5 md:text-left">
                <p class="w-full uppercase tracking-loose">Are you looking for best notes for your subjects?</p>
                <h1 class="my-4 text-3xl font-bold leading-tight">congratulations ! EDORB is here for you.</h1>
                <p class="mb-8 text-xl leading-normal">Learn and participate online assessment to grow yourself.</p>
                <a href="{{ route('about') }}">
                    <button
                        class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 bg-white rounded-full shadow-lg lg:mx-0 hover:underline">
                        About Us
                    </button>
                </a>

            </div>
            <!--Right Col-->
            <div class="w-full py-6 text-center md:w-3/5">
                <img class="z-50 w-full md:w-4/5" src="{{ asset('images\hero.png') }}">
            </div>

        </div>
    </div>
    <section class="container py-6 mx-auto mb-12 text-center">

        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center">Online assessment</h1>
        <div class="w-full mb-4">
            <div class="w-1/6 h-1 py-0 mx-auto my-0 bg-white rounded-t opacity-25"></div>
        </div>

        <h3 class="my-4 text-xl leading-tight">Edorb is preparing students for multiple online assessment. Prepare yourself
            and participate here.</h3>

        <button
            class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 bg-white rounded-full shadow-lg lg:mx-0 hover:underline">Paticipate</button>

    </section>

    <div class="container flex flex-wrap pt-4 pb-12 mx-auto text-center">
        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">Our Courses</h1>
        <div class="available_class rounded-md md:my-4 md:px-2">
            @foreach ($categories as $category)
                <div class="p-2 mb-4">
                    <h3 class="text-center my-4 text-xl leading-tight">
                        {{ $category->category }}
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 mb-2">
                        @foreach ($category->standards as $item)
                            @php
                                $randomNumber = rand(1, 7);
                            @endphp
                            <div class="border bg-white shadow rounded-md overflow-hidden hover:shadow-lg">
                                <div class="h-48 w-full bg-gray-200">
                                    <img src={{ asset('images\classHeader\header_' . $randomNumber . '.jpg') }}
                                        alt="Image 1" class="h-full w-full object-cover">
                                </div>
                                <div class="p-3">
                                    <div class="py-1">
                                        {{-- check if the user is authenticate or not --}}
                                        @auth
                                            @if ($user->admin)
                                                <div class="flex flex-wrap justify-between">
                                                    @if ($item->master_price_status_id == '1')
                                                        <p class="text-sm text-blue-500">Free</p>
                                                    @else
                                                        <p class="text-sm text-blue-500">
                                                            <span class="font-bold text-md text-gray-400"
                                                                style="text-decoration: line-through"><i
                                                                    class="fa-solid fa-indian-rupee-sign"></i>{{ $item->actual_price }}</span>
                                                            <span class="font-bold text-md text-red-600"><i
                                                                    class="fa-solid fa-indian-rupee-sign"></i>{{ $item->offer_price }}</span>
                                                        </p>
                                                    @endif
                                                    <div>
                                                        <form action="{{ route('class.delete') }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <input type="hidden" name="classID" value="{{ $item->id }}">
                                                            <button type="submit"
                                                                class="rounded-full bg-red-200 px-2 py-1 text-xs text-red-500 hover:text-red-800"
                                                                onclick="return confirm('Are you sure you want to delete this class and related resources?')">
                                                                <i class="fa fa-trash text-xs"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                    <div class="flex flex-wrap justify-between items-end pb-1">
                                        <p class="font-bold text-xs">Free & Premium</p>
                                        <p class="text-xs font-bold text-slate-500">NCERT</p>
                                    </div>
                                    <div class="flex flex-wrap justify-between items-end pb-1">
                                        <p class="font-bold text-sm">{{ $item->name }}</p>
                                        {{-- <p class="text-sm font-bold text-slate-500">Assamese + English</p> --}}
                                    </div>
                                    <div class="">
                                        <x-class-tags :tagsCsv="$item->tags" />
                                    </div>
                                    <p class="text-md text-gray-700 mt-2 max-h-[15rem] min-h-[15rem] w-full text-justify"
                                        style="overflow: hidden; text-overflow: ellipsis;">
                                        {{ $item->description }}
                                    </p>
                                </div>
                                <div class="px-2">
                                    {{-- <a href="{{ route('subjectList', [$item->id]) }}">Explore Notes</a> --}}
                                    {{-- <a href="{{ url('content/subject', [$item->name, 'all-subjects']) }}">Explore Notes</a> --}}
                                    <a class="text-md font-bold block"
                                        href="{{ url('content/subject', [$item->slug, 'language', 'all-languages']) }}">
                                        <button class="w-full py-4 mx-auto mb-4 font-bold text-white bg-blue-500 rounded-full shadow-lg lg:mx-0 hover:underline"
                                            data-id="1">
                                            View Content
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('layouts.footer')

    @push('styles')
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
    @endpush

    @push('scripts')
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
    @endpush
@endsection
