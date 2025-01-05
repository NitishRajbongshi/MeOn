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
                    <li class="text-neutral-500 dark:text-neutral-400">Manage Meta Data</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h2 class="font-bold text-lg text-blue-500">Manage Your Meta Data</h2>
                        <p class="text-sm">Add meta details for the note list page. </p>
                        <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="class">Select Class:<span
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
                                    <label class="text-sm" for="subject">Select Subject:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="subject" id="subject"
                                        class="border w-full border-blue-300 rounded-sm outline-none p-1 text-sm md:w-1/2">
                                        <option value="">Choose Subject</option>
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
                            <div class="text-right">
                                <button id="get-meta-data"
                                    class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                                    type="button">Get Meta Data</button>
                            </div>
                        </div>
                        {{-- Form --}}
                        <div class="hidden border rounded-md border-slate-200 my-2 p-1 md:p-2" id="meta-form">
                            <form action="{{ route('manage.meta.chapter') }}" method="post" autocomplete="off">
                                @csrf
                                {{-- alert --}}
                                <div id="alert"
                                    class="hidden bg-red-200 border border-red-300 text-red-900 rounded-sm p-2">
                                    <p>No meta data added yet! Add relavent meta data for the page.</p>
                                </div>
                                <input type="hidden" name="chapter" id="chapter-hidden" value="">
                                <div class="md:flex my-2">
                                    <div class="w-full md:w-1/3">
                                        <label class="text-sm" for="title">Page Title: <span
                                                class="text-xs text-red-500">*</span></label>
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        <input type="text" id="title" name="title"
                                            placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit."
                                            value="{{ old('title') }}"
                                            class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm" required>
                                        @error('title')
                                            <p class="text-xs text-red-500">
                                                <i class="fa fa-warning mr-1 my-1"></i>
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="md:flex my-2">
                                    <div class="w-full md:w-1/3">
                                        <label class="text-sm" for="description">Page Description:<span
                                                class="text-xs text-red-500">*</span></label>
                                    </div>
                                    <div class="w-full md:w-2/3">
                                        <textarea rows="4" id="description" name="description"
                                            class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste officia facilis ex, porro natus corrupti rem placeat magni dolor atque quia mollitia repudiandae vitae, debitis excepturi id libero rerum omnis?" required>{{ old('link') }}</textarea>
                                        @error('description')
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
                                        Update Meta Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/4">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h2 class="font-bold text-lg text-blue-500">Quick Links</h2>
                        <ol class="text-xs text-red-600">
                            <li><i class="fa-solid fa-link text-xs mr-2"></i><a
                                    href="{{ route('manage.meta.class') }}">Manage subject list meta data</a></li>
                            <li><i class="fa-solid fa-link text-xs mr-2"></i><a href="#">Manage chapter list meta
                                    data</a></li>
                            <li><i class="fa-solid fa-link text-xs mr-2"></i><a href="#">Manage note list meta
                                    data</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </x-main-content>
    </main>
    @include('layouts.footer')
@endsection
@push('scripts')
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
            });

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
        });

        document.getElementById('get-meta-data').addEventListener('click', function() {
            let classId = document.getElementById('class').value;
            let subjectId = document.getElementById('subject').value;
            let chapterId = document.getElementById('chapter').value;
            if (classId === '' || subjectId === '' || chapterId === '') {
                alert('Please select class, subject and chapter to get meta data!');
                return;
            }
            document.getElementById('meta-form').classList.remove('hidden');
            // ajax request to get meta data
            $.ajax({
                url: `{{ route('get.meta.chapter') }}`,
                type: 'GET',
                data: {
                    chapter: chapterId,
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    document.getElementById('chapter-hidden').value = chapterId;
                    if (response.status === 'success') {
                        document.getElementById('alert').classList.add('hidden');
                        document.getElementById('title').value = response.title;
                        document.getElementById('description').value = response.description;
                    } else {
                        document.getElementById('alert').classList.remove('hidden');
                        document.getElementById('title').value = '';
                        document.getElementById('description').value = '';
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endpush
