<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EDORB</title>
</head>

<body class="bg-slate-200">
    <div class="flex justify-center items-center h-screen">
        <div class="w-full md:w-[25rem] h-auto border bg-white p-2 text-center shadow-sm">
            <div class="flex justify-center items-center pt-3">
                @if ($status == 'Success')
                    <img class="w-[4rem]" src="{{ asset('gifs/icons8-check.gif') }}" alt="">
                @else
                    <img class="w-[4rem]" src="{{ asset('gifs/icons8-wrong.gif') }}" alt="">
                @endif
            </div>
            <div class="py-3">
                @if ($status == 'Success')
                    <h1 class="font-bold uppercase text-green-600 text-lg py-2">{{ $status }}</h1>
                @else
                    <h1 class="font-bold uppercase text-red-600 text-lg py-2">{{ $status }}</h1>
                @endif
                <p class="">{{ $description }}</p>
                <div class="py-5">
                    <a href="/" class="border border-slate-500 text-slate-800 bg-slate-100 font-bold p-1">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
