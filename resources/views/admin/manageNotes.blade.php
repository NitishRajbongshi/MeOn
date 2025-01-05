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
                    <li class="text-neutral-500 dark:text-neutral-400">Manage Notes</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full lg:w-[70%]">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="{{ route('manageNote') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Upload Notes
                                </span>
                            </fieldset>
                            <div class="md:flex">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="class">Select Class:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="class" id="class"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose one</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('class')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="subject">Select Subject:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="subject" id="subject"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose one</option>
                                    </select>

                                    @error('subject')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="chapter">Select Chapter:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="chapter" id="chapter"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose one</option>
                                    </select>

                                    @error('chapter')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="name">Note Title: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="name" name="name" placeholder="Rational Number"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">

                                    @error('name')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="description">Note Description:</label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <textarea rows="4" id="description" name="description"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm"
                                        placeholder="Write any description if needed..."></textarea>

                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="price_status">Select Price Status:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="price_status" id="price_status"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose One</option>
                                        @foreach ($priceStatues as $priceStatue)
                                            <option value="{{ $priceStatue->id }}">
                                                {{ $priceStatue->status }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('price_status')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
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
                                            Upload multiple images at once of type .jpg or .jpeg and size should less than
                                            5MB
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button
                                    class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                    type="submit">
                                    <i class="fa fa-save mr-1"></i>
                                    Upload Note
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-[29.5%]">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h1>SideBar</h1>
                    </div>
                </div>
            </div>
            {{-- Data table --}}
            <div class="border rounded-md">
                <div class="my-3 text-center text-md">
                    <span class="border rounded-sm p-1 font-bold text-blue-900 border-blue-900 bg-blue-200">
                        List of all notes
                    </span>
                </div>
                <div class="flex flex-col overflow-x-auto">
                    <div class="">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-1">#</th>
                                            <th scope="col" class="px-6 py-1">Class</th>
                                            <th scope="col" class="px-6 py-1">Subject</th>
                                            <th scope="col" class="px-6 py-1">Chapter</th>
                                            <th scope="col" class="px-6 py-1">Title</th>
                                            <th scope="col" class="px-6 py-1">Description</th>
                                            <th scope="col" class="px-6 py-1 text-center">Pricing</th>
                                            <th scope="col" class="px-6 py-1">View</th>
                                            <th scope="col" class="px-6 py-1">Upload</th>
                                            <th scope="col" class="px-6 py-1">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($notes as $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-1 font-medium text-center">
                                                    {{ $i }}</td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->class_name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->subject_name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    {{ $item->chapter_name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->description }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    @if ($item->master_price_status_id == '1')
                                                        Free
                                                    @else
                                                        Paid
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <a href="{{ url('/notes/view', $item->name) }}">
                                                        <i class="fa fa-eye text-xs"></i>
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <a href="{{ url('/admin/manageNotes/upload', $item->name) }}">
                                                        <i class="fa fa-plus text-xs"></i>
                                                    </a>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <i class="fa fa-trash text-xs"></i>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-xs my-3 p-2">
                    <span class="text-xs">
                        {{ $notes->links() }}
                    </span>
                </div>
            </div>
        </x-main-content>
        @include('layouts.modal-layout')
    </main>
    @include('layouts.footer')
    <script>
        $(document).ready(function() {
            // Get the subjects by a class
            $('#class').on('change', () => {
                // Get CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $('#subject').empty();
                $('#subject').append('<option value="">Choose One</option>');

                const selectedClass = $('#class').val();
                $.ajax({
                    url: '/admin/getSubject/' + selectedClass,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $.each(response.result, function(index, subject) {
                                $('#subject').append('<option value="' + subject.id +
                                    '">' +
                                    subject.name + '</option>');
                            });
                        } else {
                            alert(`Failed! ${response.message}`);
                        }
                    },
                    error: function(e) {
                        console.error('AJAX error:', e);
                        alert("Server Error!");
                    }
                });
            })

            // Get the chapter by a subject
            $('#subject').on('change', () => {
                // Get CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $('#chapter').empty();
                $('#chapter').append('<option value="">Choose One</option>');

                const selectedSubject = $('#subject').val();
                $.ajax({
                    url: '/admin/getChapter/' + selectedSubject,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $.each(response.result, function(index, chapter) {
                                $('#chapter').append('<option value="' + chapter.id +
                                    '">' +
                                    chapter.name + '</option>');
                            });
                        } else {
                            alert(`Failed! ${response.message}`);
                        }
                    },
                    error: function(e) {
                        console.error('AJAX error:', e);
                        alert("Server Error!");
                    }
                });
            })
        })
    </script>
@endsection
