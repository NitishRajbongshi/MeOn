<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EDORB</title>
</head>

<body class="bg-slate-100">
    <div class="flex justify-center items-center h-screen">
        <div class="w-full md:w-[40rem] h-full md:h-auto bg-white p-4 text-center shadow-lg rounded-lg">
            <div class="flex justify-center items-center text-2xl">
                @if ($status == 'Success')
                    <div class="my-5 text-green-800">
                        <i class="fa fa-check-circle fa-2xl" class=""></i>
                    </div>
                @else
                    <div class="my-5 text-red-800">
                        <i class="fa fa-warning fa-2xl" class=""></i>
                    </div>
                @endif
            </div>
            <div class="py-3">
                @if ($status == 'Success')
                    <h1 class="font-bold uppercase text-green-800 text-lg py-2">{{ $status }}</h1>
                @else
                    <h1 class="font-bold uppercase text-red-800 text-lg py-2">{{ $status }}</h1>
                @endif
                <p class="my-5 mx-4">{{ $description }}</p>
                <div class="py-5">
                    <a href="/"
                        class="font-bold py-1 px-2 bg-red-900 text-white rounded-sm hover:shadow-md hover:bg-red-700">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
