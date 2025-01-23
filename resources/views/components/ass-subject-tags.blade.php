@props(['tagsCsv', 'routeParam'])

@php
    $tags = $tagsCsv ? explode(',', $tagsCsv) : [];
@endphp

<ul class="flex mb-2">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-yellow-200 text-blue-800 rounded-sm py-0.5 px-3 mr-1 text-xs hover:text-white">
            #
            <a href="{{ route('subjectList.assamese', array_merge($routeParam, ['tag' => trim($tag)])) }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
