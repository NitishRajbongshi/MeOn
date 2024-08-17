@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<x-show-notification />
<main>
    <x-user-sidebar>
        <div class="">
            <h1 class="text-xl">Welcome <span class="font-bold text-2xl">{{ $user->name }}</span></h1>
        </div>
    </x-user-sidebar>
</main>
@include('layouts.footer')
@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('css/user/sidebar.css')}}">
@endpush
