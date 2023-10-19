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
                    <li class="text-neutral-500 dark:text-neutral-400">Manage Chapter</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="{{ route('manageClass') }}" method="post" autocomplete="off">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Chapter Details
                                </span>
                            </fieldset>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="name">Chapter Name: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="name" name="name" placeholder="Chapter 1"
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
                                    <label class="text-sm" for="description">Chapter Description:</label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <textarea rows="4" id="description" name="description"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm"
                                        placeholder="Write any description if needed..."></textarea>
                                </div>
                            </div>
                            <div class="md:flex">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="class">Select Class:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="class" id="class"
                                        class="border border-blue-300 rounded-sm outline-none p-1 text-sm">
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
                            <div class="md:flex">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="subject">Select Subject:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="subject" id="subject"
                                        class="border border-blue-300 rounded-sm outline-none p-1 text-sm">
                                        <option value="">Choose one</option>
                                    </select>

                                    @error('class')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button
                                    class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                    type="submit">
                                    <i class="fa fa-save mr-1"></i>
                                    Add Chapter
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

            {{-- Data table --}}
            <div class="border rounded-md">
                <div class="my-3 text-center text-md">
                    <span class="border rounded-sm p-1 font-bold text-blue-900 border-blue-900 bg-blue-200">
                        Available Chapter List
                    </span>
                </div>
                <div class="flex flex-col overflow-x-auto">
                    <div class="sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-1">#</th>
                                            <th scope="col" class="px-6 py-1">Name</th>
                                            <th scope="col" class="px-6 py-1">Description</th>
                                            <th scope="col" class="px-6 py-1">Edit</th>
                                            <th scope="col" class="px-6 py-1">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($classes as $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-1 font-medium">{{ $i }}</td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->description }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    <button class="openModal" data-id="{{ $item->id }}">
                                                        <i class="fa fa-pen text-xs"></i>
                                                    </button>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
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
                        {{-- {{ $classes->links() }} --}}
                    </span>
                </div>
            </div>
        </x-main-content>
        @include('layouts.modal-layout')
    </main>
    <footer>
        <div class="w-full bg-white p-3">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste sit sapiente totam a. Vitae, illum earum.
                Debitis repudiandae error nam.</p>
        </div>
    </footer>
    <script>
        $(document).ready(function() {
            $('.openModal').on('click', function() {
                const id = $(this).data('id');

                // Get CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/admin/manageClass/' + id,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'success' && response.result != null) {
                            $('#editName').val(response.result.name);
                            $('#editDescription').val(response.result.description);

                            // show the modal
                            $('#modal').removeClass('hidden');
                            $('#modal').addClass('flex');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(e) {
                        console.error('AJAX error:', e);
                    }
                });

                $('#submitBtn').on('click', function() {

                    var formData = $('#myForm').serialize();

                    $.ajax({
                        url: '/admin/manageClass/edit/' + id,
                        method: 'POST',
                        dataType: 'json',
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('AJAX response:', response);
                        },
                        error: function(error) {
                            console.error('AJAX error:', error);
                        }
                    });

                    // Close the modal (optional)
                    $('#modal').addClass('hidden');
                });

            });

            $('#closeModal').on('click', function() {
                $('#modal').removeClass('flex');
                $('#modal').addClass('hidden');
            });

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
                        if(response.status == 'success') {
                            $.each(response.result, function(index, subject) {
                                $('#subject').append('<option value="' + subject.id + '">' +
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
        });
    </script>
@endsection
