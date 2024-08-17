@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="container mx-auto min-h-screen">
        <h1>Our Plans</h1>
        <div>
            <div class="border my-2 p-4">
                <h1 class="font-bold">Basic Plan</h1>
                <ul>
                    <li>Chapter Access: Get all notes for a specific chapter.</li>
                    <li>Quick Revisions: Perfect for focused study before exams.</li>
                    <li>Budget-Friendly: Affordable option for targeted learning.</li>
                    <li>Why Choose This?: Ideal for mastering one chapter at a time without paying for more.</li>
                </ul>
                {{-- <a href="{{ URL::temporarySignedRoute('plan.basic', now()->addMinutes(10), ['user' => Auth::user()->name, 'email' => Auth::user()->email]) }}">
                    <button>Buy</button>
                </a> --}}
                <a href="{{ URL::temporarySignedRoute('plan.standard', now()->addMinutes(1)) }}">
                    <button class="border border-green-400 bg-green-200 text-green-700 px-2 font-bold">Explore Plan</button>
                </a>
            </div>
            <div class="border my-2 p-4">
                <h1 class="font-bold">Standard Plan</h1>
                <ul>
                    <li>Full Subject Access: Unlock all chapters in one subject.</li>
                    <li>Thorough Prep: Great for complete understanding of a subject.</li>
                    <li> Cost-Effective: Access the entire subject for a reasonable price.</li>
                    <li>Why Choose This?: Perfect for students who want to excel in a specific subject with all the
                        resources in one place.</li>
                </ul>
                <div>
                    <strong>Mock Test Papers: Test your knowledge with subject-specific mock exams to evaluate and improve
                        your preparation.</strong>
                </div>
                <a href="{{ URL::temporarySignedRoute('plan.standard', now()->addMinutes(1)) }}">
                    <button class="border border-green-400 bg-green-200 text-green-700 px-2 font-bold">Explore Plan</button>
                </a>
            </div>
            <div class="border my-2 p-4">
                <h1 class="font-bold">Premium Plan</h1>
                <ul>
                    <li>
                        All Subjects: Get access to every subject in your class.
                    </li>
                    <li>
                        Total Coverage: Study all subjects with ease and confidence.
                    </li>
                    <li>
                        Best Value: The most comprehensive plan at the best price.
                    </li>
                    <li>
                        Why Choose This?: Ideal for students who want to be fully prepared across all subjects, ensuring top
                        grades.
                    </li>
                </ul>
                <div>
                    <strong>Mock Test Papers: Benefit from mock tests across all subjects to assess your readiness and boost your exam confidence.</strong>
                </div>
                <a href="{{ URL::temporarySignedRoute('plan.premium', now()->addMinutes(10)) }}">
                    <button class="border border-green-400 bg-green-200 text-green-700 px-2 font-bold">Explore Plan</button>
                </a>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
