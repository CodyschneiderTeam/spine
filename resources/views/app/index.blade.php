{{-- HTML --}}
<!doctype html>
<html lang="{{ App::getLocale() }}">

    {{-- Head --}}
    <head>

        {{-- Title --}}
        <title>{{ $title }}</title>

        {{-- Meta --}}
        <meta name="description"           content="{{ Config::get('app.description') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection"      content="telephone=no">
        <meta name="Content-Type"          content="text/html; charset=UTF-8">
        <meta name="viewport"              content="width=device-width, initial-scale=1">

        {{-- Open Graph --}}
        <meta property="og:title"       content="{{ $title }}">
        <meta property="og:description" content="{{ Config::get('app.description') }}">
        <meta property="og:type"        content="website">
        <meta property="og:url"         content="{{ Request::url() }}">
        <meta property="og:image"       content="{{ URL::asset('images/card.png') }}">
        <meta property="og:secure_url"  content="{{ URL::asset('images/card.png') }}">

        {{-- Twitter Card --}}
        <meta name="twitter:card"        content="summary_large_image">
        <meta name="twitter:title"       content="{{ $title }}">
        <meta name="twitter:description" content="{{ Config::get('app.description') }}">
        <meta name="twitter:image"       content="{{ URL::asset('images/card.png') }}">

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ URL::asset('images/logo.png') }}">

        {{-- Vite --}}
        @vite(['bootstrap/app.js'])

    </head>

    {{-- Body --}}
    <body class="font-sans leading-none {{ Env::get('APP_DUSK') }} {{ Config::get('app.env') }}">

        {{-- Routes --}}
        @routes()

        {{-- Inertia --}}
        @inertia()

    </body>

</html>