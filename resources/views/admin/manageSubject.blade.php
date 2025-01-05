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
                    <li class="text-neutral-500 dark:text-neutral-400">Manage Subject</li>
                </ol>
            </div>

            <div class="flex flex-wrap-reverse md:justify-between md:gap-1">
                <div class="w-full lg:w-[70%]">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="{{ route('manageSubject') }}" method="post" autocomplete="off">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Subject Details
                                </span>
                            </fieldset>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="name">Subject Name: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="name" name="name" placeholder="G. Science"
                                        value="{{ old('name') }}"
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
                                    <label class="text-sm" for="description">Subject Description:</label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <textarea rows="4" id="description" name="description"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm"
                                        placeholder="Write any description if needed...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="class">Class:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="class" id="class"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose Class</option>
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
                                    <label class="text-sm" for="language">Language:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="language" id="language"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose Language</option>
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}">
                                                {{ $language->language }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('language')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
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
                            <div class="md:flex my-2 price_tag" style="display: none;">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="actual_price">Actual Price (Rs.): <span
                                            class="text-xs text-red-500"></span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="number" id="actual_price" name="actual_price" placeholder="0.00"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                </div>
                            </div>
                            <div class="md:flex my-2 price_tag" style="display: none;">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="offer_price">Offer Price (Rs.): <span
                                            class="text-xs text-red-500"></span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="number" id="offer_price" name="offer_price" placeholder="0.00"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                </div>
                            </div>
                            <div class="flex justify-end">
                                <button
                                    class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                    type="submit">
                                    <i class="fa fa-save mr-1"></i>
                                    Add Subject
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-full lg:w-[29.5%]">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h1 class="font-bold text-red-500 underline text-md mb-1">Instruction</h1>
                        <p class="text-sm text-gray-600 text-justify">
                            <i class="fa fa-circle-dot text-xs"></i>
                            Please choose the class from the drop-down list carefully. Once submitted, it cannot be edited.
                        </p>
                        <p class="text-sm text-gray-600 text-justify">
                            <i class="fa fa-circle-dot text-xs"></i>
                            The subject name will be used to create a slug for the URL automatically.
                        </p>
                        <p class="text-sm text-gray-600 text-justify">
                            <i class="fa fa-circle-dot text-xs"></i>
                            The subject name should not contain extra space, unnecessary special characters, or numeric values.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Data table --}}
            <div class="border rounded-md">
                <div class="my-3 text-center text-md">
                    <span class="border rounded-sm p-1 font-bold text-blue-900 border-blue-900 bg-blue-200">
                        Available Subject List
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
                                            <th scope="col" class="px-6 py-1">Subject Name</th>
                                            <th scope="col" class="px-6 py-1">Subject Description</th>
                                            <th scope="col" class="px-6 py-1 text-center">Subject For</th>
                                            <th scope="col" class="px-6 py-1 text-center">Language</th>
                                            <th scope="col" class="px-6 py-1 text-center">Pricing</th>
                                            <th scope="col" class="px-6 py-1 text-center">Actual Price (Rs)</th>
                                            <th scope="col" class="px-6 py-1 text-center">Offer Price (Rs)</th>
                                            <th scope="col" class="px-6 py-1 text-center">Edit</th>
                                            <th scope="col" class="px-6 py-1 text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($subjects as $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-1 font-medium">{{ $i }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->description }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->class_name }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->language }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    @if ($item->master_price_status_id == '1')
                                                        Free
                                                    @else
                                                        Paid
                                                    @endif
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    {{ $item->actual_price }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    {{ $item->offer_price }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1 text-center">
                                                    <button class="openModal" data-id="{{ $item->id }}">
                                                        <i class="fa fa-pen text-xs"></i>
                                                    </button>
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
                        {{ $subjects->links() }}
                    </span>
                </div>
            </div>
        </x-main-content>
        @include('layouts.modal-layout-subject')
        @include('layouts.success-modal')
        @include('layouts.failed-modal')
    </main>
    @include('layouts.footer')
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#price_status').on('change', function() {
                    const priceStatus = $(this).val();
                    $('.price_tag').hide();
                    if (priceStatus === '2') {
                        $('.price_tag').show();
                    }
                })

                $('.openModal').on('click', function() {
                    const id = $(this).data('id');

                    // Get CSRF token from the meta tag
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: '/admin/manageSubject/' + id,
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
                            url: '/admin/manageSubject/edit/' + id,
                            method: 'POST',
                            dataType: 'json',
                            data: formData,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    $('.modalContent').html(response.message);
                                    $('#successModal').removeClass('hidden');
                                    $('#successModal').addClass('flex');
                                }
                                if (response.status === 'failed') {
                                    $('.modalContent').html(response.message);
                                    $('#failedModal').removeClass('hidden');
                                    $('#failedModal').addClass('flex');
                                }
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


            });

            function refreshPage() {
                location.reload();
            }
        </script>
    @endpush
@endsection
