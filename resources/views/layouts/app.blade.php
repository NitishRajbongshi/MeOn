<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GVEFRY24FR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-GVEFRY24FR');
    </script>
    {{-- google ads --}}
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9321916538243094"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Discover comprehensive Assamese and English notes for classes 5 to 10 (SEBA and NCERT) and exercise solutions for class 11 and 12 science (NCERT) in physics, chemistry, maths, and biology at edorb.in. We also offer online coaching for JEE, CEE, NEET, NEST, and more.')">
    <meta name="keywords" content="@yield('meta_keywords', 'edorb, edorb.in, edorb assamese notes, edorb english notes, edorb class 5 to 10 notes, edorb class 11 and 12 notes, edorb online coaching, edorb jee coaching, edorb cee coaching, edorb neet coaching, edorb nest coaching')">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- meta tag for prevent back button --}}
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" href="{!! asset('images/main_logo.png') !!}" />
    {{-- CSRF meta tag --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Tailwind --}}
    @vite('resources/css/app.css')
    {{-- Navbar Theme --}}
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.js"></script>
    {{-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> --}}
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- font family --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Noto+Serif+Ahom&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    {{-- jQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- alpine js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css" rel="stylesheet">
    <title>@yield('title', 'Edorb')</title>
    {{-- It will include extra links only for particular page --}}
    @stack('styles')
</head>

<body class="bg-gradient-to-t h-screen" style="font-family: 'Nunito Sans', 'Noto Serif Ahom', serif;">
    @include('layouts.preloader')
    @yield('content')
    @stack('scripts')
    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            preloader.style.display = 'none';
        });
    </script>
</body>

</html>
