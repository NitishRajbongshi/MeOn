@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto p-2 min-h-screen">
        <div class="text-center font-bold my-2">
            <h1 class="text-xl text-green-900">OUR PLANS</h1>
        </div>
        <div class="flex flex-wrap justify-between items-start">
            <div class="w-full bg-white border my-2 md:w-[33%] hover:shadow-md">
                <div class="w-full bg-blue-600 text-white text-center">
                    <h1 class="font-bold text-xl p-3">BASIC</h1>
                </div>
                <div class="flex justify-center my-2">
                    <img src="{{ asset('icons/piggy.png') }}" alt="icon" width="160rem;">
                </div>
                <div class="p-4">
                    <ul class="text-justify">
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-blue-500"></i>Chapter
                            Access: <span class="text-slate-600 text-md">Get all notes for a specific chapter.</span></li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-blue-500"></i>Quick
                            Revisions: <span class="text-slate-600 text-md">Perfect for focused study before exams.</span>
                        </li>
                        <li class="my-2 text-md font-bold"><i
                                class="fa fa-check-circle mr-2 text-blue-500"></i>Budget-Friendly: <span
                                class="text-slate-600 text-md">Affordable option for targeted learning.</span></li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-question-circle mr-2 text-red-500"></i>Why Choose
                            This? <br><span class="text-slate-600 text-md">Ideal for mastering one chapter at a time without
                                paying for more.</span></li>
                    </ul>
                </div>
                <div class="w-full px-2 mb-4">
                    <a href="{{ URL::temporarySignedRoute('plan.basic', now()->addMinutes(60)) }}">
                        <button
                            class="bg-blue-800 w-full text-white text-lg p-3 rounded-lg font-bold hover:bg-blue-600">Explore</button>
                    </a>
                </div>
            </div>
            <div class="w-full bg-white border my-2 md:w-[33%] hover:shadow-md">
                <div class="w-full bg-green-600 text-white text-center">
                    <h1 class="font-bold text-xl p-3">STANDARD</h1>
                </div>
                <div class="flex justify-center my-2">
                    <img src="{{ asset('icons/money_tree.png') }}" alt="icon" width="130rem;">
                </div>
                <div class="p-4">
                    <ul class="text-justify">
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-green-500"></i>Full
                            Subject Access:<span class="text-slate-600 text-md"> Unlock all chapters in one subject.</span>
                        </li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-green-500"></i>Thorough
                            Prep:<span class="text-slate-600 text-md"> Great for complete understanding of a subject.</span>
                        </li>
                        <li class="my-2 text-md font-bold">
                            <i class="fa fa-check-circle mr-2 text-green-500"></i>Cost-Effective:<span
                                class="text-slate-600 text-md"> Access the entire subject for a reasonable price.</span>
                        </li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-question-circle mr-2 text-red-500"></i>Why Choose
                            This?<br><span class="text-slate-600 text-md"> Perfect for students who want to excel in a
                                specific subject with all the
                                resources in one place.</span></li>
                    </ul>
                </div>
                <div class="px-4">
                    <strong class="text-justify text-md text-red-600"><i
                            class="fa fa-info-circle mr-2 text-red-800"></i>Test your knowledge with subject-specific mock
                        exams to evaluate and improveyour preparation.
                    </strong>
                </div>
                <div class="w-full px-2 mt-2 mb-4">
                    <a href="{{ URL::temporarySignedRoute('plan.standard', now()->addMinutes(60)) }}">
                        <button
                            class="bg-green-800 w-full text-white text-lg p-3 rounded-lg font-bold hover:bg-green-600">Explore</button>
                    </a>
                </div>
            </div>
            <div class="w-full bg-white border my-2 md:w-[33%] hover:shadow-md">
                <div class="w-full bg-red-600 text-white text-center">
                    <h1 class="font-bold text-xl p-3">PREMIUM</h1>
                </div>
                <div class="flex justify-center my-2">
                    <img src="{{ asset('icons/money_bag.png') }}" alt="icon" width="150rem;">
                </div>
                <div class="p-4">
                    <ul class="text-justify">
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-red-500"></i>
                            All Subjects:<span class="text-slate-600 text-md"> Get access to every subject in your class.
                            </span>
                        </li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-red-500"></i>Total
                            Coverage:<span class="text-slate-600 text-md"> Study all subjects with ease and confidence.
                            </span>
                        </li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-check-circle mr-2 text-red-500"></i>Best
                            Value:<span class="text-slate-600 text-md"> The most comprehensive plan at the best price.
                            </span>
                        </li>
                        <li class="my-2 text-md font-bold"><i class="fa fa-question-circle mr-2 text-yellow-500"></i>Why Choose
                            This?: <br><span class="text-slate-600 text-md"> Ideal for students who want to be fully
                                prepared across all subjects, ensuring top grades.
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="px-4">
                    <strong class="text-justify text-md text-red-600">
                        <i class="fa fa-info-circle mr-2 text-red-800"></i>Benefit from mock tests across all subjects to
                        assess your readiness and boost
                        your exam confidence.
                    </strong>
                </div>
                <div class="w-full px-2 mt-2 mb-4">
                    <a href="{{ URL::temporarySignedRoute('plan.premium', now()->addMinutes(60)) }}">
                        <button
                            class="bg-red-800 w-full text-white text-lg p-3 rounded-lg font-bold hover:bg-red-600">Explore</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
