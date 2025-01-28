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
    <div class="container mx-auto">
        @foreach ($classes as $item)
            <a href="{{ url('content/subject', [$item->slug, 'language', 'all-languages']) }}"></a>
        @endforeach
        @foreach ($subjects as $item)
            <a href="{{ url('/notes/chapter', [$item->slug, 'all-chapters']) }}"></a>
        @endforeach
        @foreach ($chapters as $item)
            <a href="{{ url('/notes/show', [$item->slug, 'all-notes']) }}"></a>
        @endforeach
    </div>
    <div class="pt-24 container mx-auto">
        <div class="container flex flex-col flex-wrap items-center px-3 mx-auto md:flex-row">
            <!--Left Col-->
            <div class="flex flex-col items-start justify-center w-full text-center md:w-2/5 md:text-left">
                <p class="w-full uppercase tracking-loose">Are you looking for best notes for your subjects?</p>
                <h1 class="my-4 text-3xl font-bold leading-tight">Congratulations ! EDORB is here for you.</h1>
                <p class="mb-8 text-xl leading-normal">Learn and participate online assessment to grow yourself.</p>
                <a href="{{ route('about') }}">
                    <button style="background: linear-gradient(90deg, #d53d67 0%, #daad52 100%)"
                        class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 bg-white rounded-full shadow-lg lg:mx-0 hover:text-white hover:underline">
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
        <a href="{{ route('student.assessment') }}" target="_blank">
            <button style="background: linear-gradient(90deg, #d53d67 0%, #daad52 100%)"
                class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 bg-white rounded-full shadow-lg lg:mx-0 hover:text-white hover:underline">
                Participate
            </button>
        </a>


    </section>
    <div class="container flex flex-wrap pt-4 pb-12 mx-auto">
        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">Our Courses</h1>
        <div class="w-full mb-4">
            <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
        </div>
        @foreach ($categories as $category)
            @php
                $randomNumber = rand(1, 7);
            @endphp
            <div class="flex flex-col w-full p-6 md:w-1/3">
                <div class="h-48 w-full">
                    <img src={{ asset('images\classHeader\header_' . $randomNumber . '.jpg') }} alt="{{ $category->title }}"
                        class="h-full w-full object-cover">
                </div>
                <div class="flex-1 p-4 overflow-hidden bg-slate-50 rounded-t rounded-b-none shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full text-xs text-gray-600 md:text-sm">
                            <x-class-tags :tagsCsv="$category->tags" />
                        </div>
                        <div class="w-full text-xl font-bold text-gray-800">{{ $category->category }}</div>
                        <p class="mb-3 text-justify text-base text-gray-800">
                            {{ Str::limit($category->title, 200) }}
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto overflow-hidden bg-slate-50 rounded-t-none rounded-b shadow">
                    <div class="flex items-center justify-center">
                        <a href="{{ url('category', [$category->slug, 'all-classes']) }}">
                            <button
                                class="px-8 py-4 mx-auto my-6 font-bold rounded-full shadow-lg lg:mx-0 hover:underline hover:text-white gradient"
                                style="background: linear-gradient(90deg, #d53d67 0%, #daad52 100%)">
                                Explore Classes
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container max-w-5xl m-8 mx-auto">
        <h1 class="w-full my-2 text-3xl font-bold leading-tight text-center text-gray-800">Want To Know More?</h1>
        <div class="w-full mb-4">
            <div class="w-64 h-1 py-0 mx-auto my-0 rounded-t opacity-25 gradient"></div>
        </div>

        <div class="flex flex-wrap">
            <div class="w-5/6 p-6 sm:w-1/2">
                <h3 class="mb-3 text-2xl font-bold leading-none text-gray-800">It's better to know about us</h3>
                <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at
                    ipsum eu nunc commodo posuere et sit amet ligula.<br><br>
                    <a href="{{ route('contact.us') }}">
                        <button style="background: linear-gradient(90deg, #d53d67 0%, #daad52 100%)"
                            class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 bg-white rounded-full shadow-lg lg:mx-0 hover:text-white hover:underline">
                            Contact Us
                        </button>
                    </a>
            </div>
            <div class="w-full p-6 sm:w-1/2">
                <img class="z-50 w-full md:w-4/5" src="{{ asset('images\hero.png') }}">
            </div>
        </div>

        <div class="flex flex-col-reverse flex-wrap sm:flex-row">
            <div class="w-full p-6 mt-6 sm:w-1/2">
                <img class="z-50 w-full md:w-4/5" src="{{ asset('images\hero.png') }}">
            </div>
            <div class="w-full p-6 mt-6 sm:w-1/2">
                <div class="align-middle">
                    <h3 class="mb-3 text-2xl font-bold leading-none text-gray-800">Lorem ipsum dolor sit amet</h3>
                    <p class="mb-8 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam
                        at ipsum eu nunc commodo posuere et sit amet ligula.<br><br>
                        <a href="#">
                            <button style="background: linear-gradient(90deg, #d53d67 0%, #daad52 100%)"
                                class="px-8 py-4 mx-auto my-6 font-bold text-gray-800 bg-white rounded-full shadow-lg lg:mx-0 hover:text-white hover:underline">
                                Give your feedback
                            </button>
                        </a>
                    </p>
                </div>
            </div>
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
