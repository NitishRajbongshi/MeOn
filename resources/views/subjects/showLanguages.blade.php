@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="min-h-[60%] md:min-h-[80%] flex justify-center items-center">
        <div class="w-auto h-auto ">
            <div class="text-center mb-3">
                <p class="text-xl font-bold text-blue-600">Choose Preferable Language</p>
            </div>
            <div class="flex flex-wrap items-center justify-center  md:justify-between">
                <a class="inline-block font-bold rounded-md m-2 w-48 text-center text-bold text-lg py-16 bg-blue-100 text-blue-500 hover:shadow-md hover:shadow-blue-300 hover:text-xl hover:text-blue-800"
                    href="{{ url('content/subject', [$className, 'language', 'assamese', 'all-subjects']) }}">
                    <i class="fa-solid fa-face-grin-hearts text-2xl"></i><br>
                    Assamese
                </a>
                <a class="inline-block font-bold rounded-md m-2 w-48 text-center text-bold text-lg py-16 bg-red-100 text-red-500 hover:shadow-md hover:shadow-red-300 hover:text-xl hover:text-red-800"
                    href="{{ url('content/subject', [$className, 'language', 'english', 'all-subjects']) }}">
                    <i class="fa-solid fa-face-grin-hearts text-2xl"></i><br>
                    English
                </a>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
