@props(['tagsCsv'])

@php
    $tags = $tagsCsv ? explode(',', $tagsCsv) : [];
@endphp

<ul class="flex my-1">
    @foreach ($tags as $tag)
        <li class="flex items-center justify-center bg-green-100 text-green-500 rounded-lg py-0.5 px-2 mr-1 text-xs hover:text-green-800">
            #<a class="inline-block ml-1" href="/?tag={{ trim($tag) }}">{{ $tag }}</a>
        </li>
    @endforeach
</ul>
