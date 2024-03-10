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
                    <li class="text-neutral-500 dark:text-neutral-400">Add Exam Link</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="{{ route('addExamLink') }}" method="post" autocomplete="off">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Exam Link
                                </span>
                            </fieldset>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="title">Exam Title: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="title" name="title"
                                        placeholder="Mathematics 1st sessional exam for class 12"
                                        value="{{ old('title') }}"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">

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
                                    <label class="text-sm" for="link">Exam Link:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <textarea rows="4" id="link" name="link"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm" placeholder="Copy & paste the exam link">{{ old('link') }}</textarea>
                                    @error('link')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="status">Exam Status:<span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <select name="status" id="status"
                                        class="border border-blue-300 rounded-sm outline-none p-1 text-sm">
                                        <option value="">Choose status</option>
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">
                                                {{ $status->status }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('status')
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
                                    Publish Exam Link
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
                    <span class="border rounded-sm p-1 text-sm font-bold text-blue-900 border-blue-900 bg-blue-200">
                        Available Exam List
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
                                            <th scope="col" class="px-6 py-1">Title</th>
                                            <th scope="col" class="px-6 py-1 text-center">Status</th>
                                            <th scope="col" class="px-6 py-1">Link</th>
                                            <th scope="col" class="px-6 py-1">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($examLinks as $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-1 font-medium">{{ $i }}</td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->title }}
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    <select name="examStatus" id="examStatus">
                                                        <option value="{{ $item->status_id }}">
                                                            {{ $item->status }}
                                                        </option>
                                                        @foreach ($statuses as $status)
                                                            @if ($item->status_id != $status->id)
                                                                <option value="{{ $status->id }}">
                                                                    {{ $status->status }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    {{ $item->link }}
                                                </td>
                                                <td class="whitespace-nowrap text-center px-6 py-1">
                                                    <form action="{{route('deleteExamLink')}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="linkId" value="{{$item->link_id}}">
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this exam link?')">
                                                            <i class="fa fa-trash text-xs"></i>
                                                        </button>
                                                    </form>
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
                        {{ $examLinks->links() }}
                    </span>
                </div>
            </div>
        </x-main-content>
    </main>
@endsection
