{{-- HTML --}}
<!doctype html>
<html lang="{{ App::getLocale() }}">

    {{-- Head --}}
    <head>

        {{-- Title --}}
        <title>{{ Config::get('app.name') }}</title>

        {{-- Meta --}}
        <meta name="format-detection" content="telephone=no">
        <meta name="robots"           content="noindex, nofollow" />
        <meta name="Content-Type"     content="text/html; charset=UTF-8">
        <meta name="viewport"         content="width=device-width, initial-scale=1">
        <meta name="description"      content="{{ Config::get('app.description') }}">

        {{-- Open Graph --}}
        <meta property="og:type"        content="website">
        <meta property="og:url"         content="{{ Request::url() }}">
        <meta property="og:title"       content="{{ Config::get('app.name') }}">
        <meta property="og:image"       content="{{ URL::asset('images/card.png') }}">
        <meta property="og:secure_url"  content="{{ URL::asset('images/card.png') }}">
        <meta property="og:description" content="{{ Config::get('app.description') }}">

        {{-- Twitter Card --}}
        <meta name="twitter:card"        content="summary_large_image">
        <meta name="twitter:title"       content="{{ Config::get('app.name') }}">
        <meta name="twitter:image"       content="{{ URL::asset('images/card.png') }}">
        <meta name="twitter:description" content="{{ Config::get('app.description') }}">

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ URL::asset('images/logo.png') }}">

        {{-- Fonts --}}
        <link rel="stylesheet" href="{{ Config::get('services.type_kit.url') }}">

        {{-- Scripts --}}
        <script src="https://cdn.tailwindcss.com"></script>

        {{-- Styles --}}
        <style>
            .font-sans { font-family: 'proxima-nova' !important }
        </style>

    </head>

    {{-- Body --}}
    <body class="font-sans leading-none flex flex-col justify-center items-center min-h-screen">

        {{-- Code --}}
        <h3 class="font-semibold text-indigo-600 mb-3">
            Code
        </h3>

        {{-- Title --}}
        <h1 class="font-bold text-[30px] md:text-[40px] mb-7">
            Title
        </h1>

        {{-- Description --}}
        <h2 class="text-[18px] text-gray-500 text-center leading-normal max-w-[500px] px-6 mb-9">
            Description
        </h2>

        {{-- Link --}}
        <a href="/"
           class="bg-sky-100 border border-sky-200 hover:border-sky-500 text-[13px] font-medium text-sky-600 uppercase rounded transition duration-300 px-4 pt-[10px] pb-[9px]">

            {{-- Text --}}
            Go home

        </a>

        {{-- Script --}}
        <script>
            let errors = {
                '403' : { code : 403, title : 'Forbidden',             description : 'An error occurred while attempting to access this page.' },
                '404' : { code : 404, title : 'Page Not Found',        description : 'The page you were trying to access could not be found.' },
                '405' : { code : 405, title : 'Not Allowed',           description : 'The request method is not valid for the chosen resource.' },
                '500' : { code : 500, title : 'Server Issue',          description : 'The server encountered an error. Try again, or contact us.' },
                '503' : { code : 503, title : 'Maintenance Mode',      description : 'The server is currently unavailable while we conduct routine maintenance… please check back later.' },
            };

            window.addEventListener("DOMContentLoaded", () => {
                document.querySelector('h1').innerHTML = errors[{{ $code }}].title;
                document.querySelector('h2').innerHTML = errors[{{ $code }}].description;
                document.querySelector('h3').innerHTML = errors[{{ $code }}].code;
            });
        </script>

    </body>

</html>