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
                    <li class="text-neutral-500 dark:text-neutral-400">Upload Additional Notes</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="{{ url('admin/manageNotes/upload') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Upload Notes
                                </span>
                            </fieldset>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-2/3">
                                    <input type="hidden" id="note_id" name="note_id" value="{{ $noteID }}"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">   
                                    <label class="text-sm" for="img_file">Upload Images:<span
                                        class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="file" name="img_file[]" id="img_file" accept=".jpg, .jpeg" 
                                    class="w-full rounded-sm outline-none text-sm text-blue-300" multiple required>
                                    @error('img_file')
                                            <p class="text-xs text-red-500">
                                                <i class="fa fa-warning mr-1 my-1"></i>
                                                {{ $message }}
                                            </p>
                                    @enderror
                                    <div>
                                        <p class="text-slate-500 text-[.8rem]">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            Upload multiple images at once of type .jpg or .jpeg and size should less than 5MB</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button
                                    class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                    type="submit">
                                    <i class="fa fa-save mr-1"></i>
                                    Upload Additional Note
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
        @include('layouts.modal-layout')
    </main>
    @include('layouts.footer')
    <script>
        
    </script>
@endsection
