@extends('layouts.app')

@section('content')
    <x-show-notification />
    @include('layouts.navbar')

    <main class="container mx-auto flex gap-2 my-2">
        {{-- content --}}
        <div class="w-full md:w-3/4">
            {{-- Exam Link --}}
            <div class="available_class px-4">
                <div class="text-xl border-b my-3">
                    <span class="font-bold">
                        <i class="fa fa-list text-sm mr-1"></i>
                        Exam Links
                    </span>
                </div>
            </div>
            {{-- Class section --}}
            <div class="available_class px-4">
                <div class="text-xl border-b my-3">
                    <span class="font-bold">
                        <i class="fa fa-list text-sm mr-1"></i>
                        List of Classes
                    </span>
                </div>
                <div class="flex items-start flex-wrap justify-start gap-1 md:gap-3 my-2">
                    @foreach ($classes as $item)
                        <button
                            class="class_btn bg-white rounded-lg outline-none shadow-md flex flex-col items-center w-[49%] md:w-[31%] lg:w-[18.9%] h-36 px-5 py-2 justify-center hover:shadow-xl"
                            data-id="{{ $item->id }}">
                            <div class="bg-green-100 p-5 rounded-full flex justify-center items-center">
                                <i class="fa fa-book text-green-900"></i>
                            </div>
                            <div class="text-sm my-1">
                                <p class="font-bold">
                                    {{ $item->name }}
                                </p>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- sidebar --}}
        <div class="hidden md:block md:w-1/4 px-4">
           
            <div class="notification_list ">
                <div class="text-xl border-b my-3 font-bold">
                    <p>
                        <i class="fa fa-bell text-sm"></i>
                        Recent Update
                    </p>

                </div>
                <div>
                    <ul>
                        <li>
                            <i class="fa fa-angle-right mr-1 text-red-600" aria-hidden="true"></i>
                            New Notes Uploaded
                        </li>
                    </ul>

                </div>
            </div>
        </div>


        {{-- modal for showing the subject list --}}
        <div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 items-center justify-center">
            <div class="bg-white p-4 rounded-md w-[22rem] md:w-[36rem]">
                <div class="flex justify-between mt-2 mb-3 border-b pb-1">
                    <div>
                        <span class="rounded-sm text-md p-1 font-bold  text-blue-900">
                            <i class="fa fa-list text-md mr-1" aria-hidden="true"></i>
                            Avaiable Subjects
                        </span>
                    </div>
                    <div>
                        <button id="closeModal" class="">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                {{-- Loop the available subjects --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 my-2" id="avaible_class_list">
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(() => {
            // Function to create a subject card
            function createSubjectCard(data) {
                return $('<button>', {
                    class: 'subject_btn',
                    'data-id': data.id,
                    html: $('<div>', {
                        class: 'bg-white rounded-lg outline-none shadow-md flex flex-col items-center h-36 px-5 py-2 justify-center hover:shadow-xl',
                        html: [
                            $('<div>', {
                                class: 'bg-green-100 p-5 rounded-full flex justify-center items-center',
                                html: $('<i>', {
                                    class: 'fa fa-book text-green-900'
                                })
                            }),
                            $('<div>', {
                                class: 'text-sm font-bold my-1',
                                html: $('<p>', {
                                    text: data.name
                                })
                            })
                        ]
                    })
                });
            }

            $('.class_btn').on('click', function() {
                const id = $(this).data('id');

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // getting the available subjects
                $.ajax({
                    url: '/getSubjectList/' + id,
                    method: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        $('#avaible_class_list').empty();

                        // Append subject list to the container
                        var container = $('#avaible_class_list');
                        response.result.forEach(function(data) {
                            var button = createSubjectCard(data);
                            container.append(button);
                        });

                        // show the modal
                        $('#modal').removeClass('hidden');
                        $('#modal').addClass('flex');

                        container.on('click', '.subject_btn', function() {
                            var subject_id = $(this).data('id');
                            window.location.href = '/notes/subject/' + subject_id;
                        });
                    },
                    error: function(response) {
                        alert('Failed to get the subject list');
                    }
                });

                $('#closeModal').on('click', function() {
                    $('#modal').removeClass('flex');
                    $('#modal').addClass('hidden');
                });

            })
        })
    </script>
@endsection
