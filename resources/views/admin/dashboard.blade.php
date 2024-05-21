@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <x-show-notification />
    <main>
        <x-main-content>
            <h1 class="text-xl">Welcome <span class="font-bold text-2xl">{{ $user->name }}</span></h1>
        </x-main-content>
    </main>
    @include('layouts.footer')
@endsection
