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
                    <li class="text-neutral-500 dark:text-neutral-400">Add Class Category</li>
                </ol>
            </div>

            <div class="md:flex md:gap-1">
                <div class="w-full md:w-3/4">
                    {{-- Form --}}
                    <div class="border rounded-md border-slate-200 my-2 p-1 md:p-2">
                        <form action="{{ route('classCategory') }}" method="post" autocomplete="off">
                            @csrf
                            <fieldset class="my-2">
                                <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                                    <i class="fa fa-plus mr-1"></i>
                                    Add Class Category
                                </span>
                            </fieldset>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="category">Category: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="category" name="category"
                                        placeholder="eg: High School (5 - 10)" value="{{ old('category') }}"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">

                                    @error('category')
                                        <p class="text-xs text-red-500">
                                            <i class="fa fa-warning mr-1 my-1"></i>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="title">Category Title: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="title" name="title"
                                        placeholder="Explore the best and effordable content for this category"
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
                                    <label class="text-sm" for="description">Category Description:</label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <textarea rows="4" id="description" name="description"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm"
                                        placeholder="Write any description if needed..."></textarea>
                                </div>
                            </div>
                            <div class="md:flex my-2">
                                <div class="w-full md:w-1/3">
                                    <label class="text-sm" for="tags">Related Tags: <span
                                            class="text-xs text-red-500">*</span></label>
                                </div>
                                <div class="w-full md:w-2/3">
                                    <input type="text" id="tags" name="tags"
                                        placeholder="NCERT, Assamese, Class10"
                                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">
                                    <small class="text-red-500">Tags should be single words seperated by comma(csv).</small>
                                    @error('tags')
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
                                    Add Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/4">
                    <div class="border rounded-md border-slate-200 my-2 p-2">
                        <h1 class="font-bold text-red-500 underline text-md mb-1">Instruction</h1>
                        <p class="text-sm text-gray-600 text-justify">
                            <i class="fa fa-circle-dot text-xs"></i>
                            It will help to categorized the classes when shown to users.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Data table --}}
            <div class="border rounded-md">
                <div class="my-3 text-center text-md">
                    <span class="border rounded-sm p-1 text-sm font-bold text-blue-900 border-blue-900 bg-blue-200">
                        Available Class Category
                    </span>
                </div>
                <div class="flex flex-col overflow-x-auto">
                    <div class="">
                        <div class="inline-block min-w-full py-2 px-1">
                            <div class="overflow-x-auto">
                                <table class="min-w-full text-left text-sm font-light">
                                    <thead class="border-b font-medium dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-1">#</th>
                                            <th scope="col" class="px-6 py-1">Category</th>
                                            <th scope="col" class="px-6 py-1">Title</th>
                                            <th scope="col" class="px-6 py-1">Description</th>
                                            <th scope="col" class="px-6 py-1">Tags</th>
                                            <th scope="col" class="px-6 py-1">Edit</th>
                                            <th scope="col" class="px-6 py-1">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($categories as $item)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-1 font-medium">{{ $i }}
                                                </td>
                                                <td class=" px-6 py-1">
                                                    {{ $item->category }}
                                                </td>
                                                <td class=" px-6 py-1">
                                                    {{ $item->title }}
                                                </td>
                                                <td class=" px-6 py-1">
                                                    {{ $item->description }}
                                                </td>
                                                <td class=" px-6 py-1">
                                                    @php
                                                        $tags = $item->tags ? explode(',', $item->tags) : [];
                                                    @endphp
                                                    @foreach ($tags as $tag)
                                                        <p>#{{ trim($tag) }}</p>
                                                    @endforeach
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-1">
                                                    <button class="openModal" data-id="{{ $item->id }}">
                                                        <i class="fa fa-pen text-xs"></i>
                                                    </button>
                                                </td>
                                                <td class="whitespace-nowrap text-center px-6 py-1">
                                                    <form action="{{ route('deleteExamLink') }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <input type="hidden" name="linkId"
                                                            value="{{ $item->id }}">
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure you want to delete this exam link?')">
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
                        {{ $categories->links() }}
                    </span>
                </div>
            </div>
        </x-main-content>
    </main>
    @include('layouts.footer')
@endsection
