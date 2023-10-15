@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <x-show-notification />
    <main>
        <x-main-content>
            {{-- BreadCrumbs --}}
            <div class="w-full rounded-md text-xs">
                <ol class="list-reset flex">
                    <li>
                        <a href="#"
                            class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600">Dashboard</a>
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-500 dark:text-neutral-400">/</span>
                    </li>
                    <li class="text-neutral-500 dark:text-neutral-400">Manage Class</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="" method="" autocomplete="off">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Class Details
                                </span>
                            </fieldset>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="name">Class Name: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="name" name="name" placeholder="Class 10"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm" required>
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="description">Class Description:</label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <textarea id="w3review" name="w3review" rows="4" id="description" name="description"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm"
                                        placeholder="Write any description if needed..."></textarea>
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold" 
                                type="submit">
                                <i class="fa fa-save mr-1"></i>
                                    Add Class
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/4">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h1>SideBar</h1>
                    </div>
                </div>
            </div>


        </x-main-content>
    </main>
@endsection
