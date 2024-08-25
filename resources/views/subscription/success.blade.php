@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen border bg-white p-1 md:p-4">
        <div class="container mx-auto rounded-lg bg-[#cdc2ac] p-1 md:p-4">
            <div class="flex flex-wrap justify-between rounded-lg p-1 md:m-10 md:p-10 items-start bg-stone-50 shadow-lg">
                <div class="w-full p-2 mb-2 md:mb-5 bg-white shadow-md rounded-md md:w-[35%] md:p-10">
                    <div class="flex items-center my-5">
                        <div>
                            <img class="w-[4rem]" src="{{ asset('gifs/icons8-check.gif') }}" alt="success">
                        </div>
                        <div class="">
                            <p class="text-3xl text-green-600 font-bold">Success</p>
                            <p>Your order placed successfully!</p>
                        </div>
                    </div>
                    <div>
                        <p class="font-bold text-md">REFERENCE ID: <span>{{ $reference_id }}</span></p>
                        <p class="mt-5 text-yellow-600">You will received a confirmation message once your order is approved.</p>
                        <p class="font-bold text-red-500">For any query: support@edorb.in</p>
                    </div>
                </div>
                <div class="w-full flex flex-wrap gap-2 md:gap-5 md:w-[62%]">
                    <div class="w-full shadow-md rounded-md p-2 bg-white md:p-10">
                        <div class="text-md font-bold text-blue-900 border-slate-200">
                            <h1 class="uppercase">
                                User Details
                            </h1>
                        </div>
                        <div class="my-2 rounded-sm">
                            <div class="flex flex-wrap">
                                <div class="flex flex-wrap w-full md:w-1/2">
                                    <div class="w-full md:w-1/3 font-bold">
                                        Name:
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        {{ $user->name }}
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-full md:w-1/2">
                                    <div class="w-full md:w-1/3 font-bold">
                                        Email:
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        {{ $user->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full shadow-md rounded-md p-2 bg-white md:p-10">
                        <div class="text-md pb-2 font-bold text-blue-900 border-slate-200">
                            <h1 class="uppercase">
                                Order Details
                            </h1>
                        </div>
                        <div class="my-2 rounded-sm">
                            <div class="flex flex-wrap">
                                <div class="flex flex-wrap w-full md:w-1/2">
                                    <div class="w-full md:w-1/3 font-bold">
                                        Class:
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        {{ $class->name }}
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-full md:w-1/2">
                                    <div class="w-full md:w-1/3 font-bold">
                                        Subject:
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        {{ $subject == null ? 'All Subjects' : $subject->name }}
                                    </div>
                                </div>
                                <div class="flex flex-wrap w-full md:w-1/2">
                                    <div class="w-full md:w-1/3 font-bold">
                                        Chapter:
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        {{ $chapter == null ? 'All Chapters' : $chapter->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @push('scripts')
    @endpush
@endsection
