@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <x-show-notification />
    <main>
        <x-main-content>
            <h1>hello</h1>
        </x-main-content>
    </main>
@endsection
