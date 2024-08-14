@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="min-h-[60%] md:min-h-[80%] flex justify-center items-center">
        <div class="w-auto h-auto ">
            <div class="text-center mb-4">
                <p class="text-2xl font-bold text-blue-600">Choose Language</p>
            </div>
            <div class="flex flex-wrap items-center justify-center  md:justify-between">
                <div class="m-2 w-48 text-center py-20 bg-blue-500 text-white hover:shadow-md hover:shadow-blue-300">
                    <a href="{{ url('content/subject', [$className, 'language', 'assamese', 'all-subjects']) }}"
                        class="font-bold text-xl">
                        Assamese
                    </a>
                </div>
                <div class="m-2 w-48 text-center py-20 bg-red-500 text-white hover:shadow-md hover:shadow-red-300">
                    <a href="{{ url('content/subject', [$className, 'language', 'english', 'all-subjects']) }}"
                        class="font-bold text-xl">
                        English
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
