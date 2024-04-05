@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto">
        <div class="p-1 md:p-4 w-full rounded-md text-xs">
            <ol class="list-reset flex">
                <li>
                    <a href="/"
                        class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Home</a>
                </li>
                <li>
                    <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                </li>
                <li class="text-neutral-500 dark:text-neutral-400">About Us</li>
            </ol>
        </div>

        <div class="p-1 md:py-4">
            <h1 class="text-center text-3xl font-bold underline pb-2">About Us</h1>
            {{-- Person section --}}
            <div class="flex justify-between items-center flex-wrap">
                <div
                    class="w-full md:w-[49%] p-2 mb-1 flex flex-wrap justify-center items-center border md:min-h-[15rem] rounded-md bg-white md:justify-start">
                    <div class="pe-2">
                        <img src="{{ asset('images/profile/ankur.jpeg') }}" alt="ankur" width="170rem;"
                            class="border rounded-full">
                    </div>
                    <div class="p-2 text-center md:text-start">
                        <h2 class="text-xl font-bold text-gray-500">Founder and CEO</h2>
                        <h3 class="text-2xl font-bold uppercase md:pb-2 text-blue-800">Ankur Jyoti Rajbongshi</h3>
                        <h4 class="text-xl">M.Sc. Physics</h4>
                        <h4 class="text-md md:text-xl"><span class="font-bold">Specialization: </span>Condensed Matter
                            Physics</h4>
                        <h4 class="text-md md:text-xl"><span class="font-bold">Contact: </span>7002390253</h4>
                    </div>
                </div>
                <div
                    class="w-full md:w-[49%] p-2 mb-1 flex flex-wrap justify-center items-center border md:min-h-[15rem] rounded-md bg-white md:justify-start">
                    <div class="pe-2">
                        <img src="{{ asset('images/profile/rekha.jpeg') }}" alt="ankur" width="170rem;"
                            class="border rounded-full">
                    </div>
                    <div class="p-2 text-center md:text-start">
                        <h2 class="text-xl font-bold text-gray-500">Chief Operating Officer</h2>
                        <h3 class="text-2xl font-bold uppercase md:pb-2 text-blue-800">Rekha Rani Bora</h3>
                        <h4 class="text-xl">M.Sc. Zoology</h4>
                        <h4 class="text-md md:text-xl"><span class="font-bold">Specialization: </span>Fish Biology & Fishery
                            Science</h4>
                        <h4 class="text-md md:text-xl"><span class="font-bold">Contact: </span>6000062706</h4>
                    </div>
                </div>
            </div>

            {{-- Content section --}}
            <div class="p-1">
                <p class="text-lg text-justify my-5 text-gray-600">
                    Welcome to our website <span class="font-bold">Edorb.in</span>, your one-stop destination for comprehensive study materials and
                    solutions tailored for students from Class 5 to 10 following the SEBA & from 9 to 12 following the NCERT
                    curriculum, available in both Assamese and English languages. Specifically designed for Science stream
                    (Physics, Chemistry, Mathematics, Biology) students in Classes 11 and 12, our platform offers
                    meticulously curated notes, detailed exercise
                    solutions, and engaging blogs covering advanced physics topics. Additionally, we provide online classes
                    and coaching for medical and engineering entrance exams( like JEE, CEE , NEET , NEST, etc.), ensuring a
                    holistic learning experience.
                </p>
                <p class="text-lg text-justify my-5 text-gray-600">
                    Explore our vast collection of study resources, including textbooks, video lectures, and practice exams,
                    all designed to enhance your understanding and boost your grades. Our team of experienced educators and
                    subject matter experts ensures that you receive accurate and reliable information, making learning
                    enjoyable and effective.
                </p>
                <p class="text-lg text-justify my-5 text-gray-600">
                    Whether you're preparing for board exams, competitive entrance tests, or simply aiming to deepen your
                    knowledge in physics and related fields, we have the tools and support you need. Our interactive online
                    platform allows you to study at your own pace, access live classes, and interact with tutors for
                    personalized guidance.
                </p>
                <p class="text-lg text-justify my-5 text-gray-600">
                    Join our community of motivated learners and take your academic journey to new heights. With our
                    comprehensive resources and expert guidance, success is within your reach.
                </p>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
