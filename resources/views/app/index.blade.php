{{-- HTML --}}
<!doctype html>
<html lang="{{ App::getLocale() }}">

    {{-- Head --}}
    <head>

        {{-- Title --}}
        <title>{{ $title }}</title>

        {{-- Meta --}}
        <meta name="format-detection" content="telephone=no">
        <meta name="robots"           content="{{ $robots ?? 'all' }}" />
        <meta name="Content-Type"     content="text/html; charset=UTF-8">
        <meta name="viewport"         content="width=device-width, initial-scale=1">
        <meta name="description"      content="{{ Config::get('app.description') }}">

        {{-- Open Graph --}}
        <meta property="og:type"        content="website">
        <meta property="og:title"       content="{{ $title }}">
        <meta property="og:url"         content="{{ Request::url() }}">
        <meta property="og:image"       content="{{ URL::asset('images/card.png') }}">
        <meta property="og:secure_url"  content="{{ URL::asset('images/card.png') }}">
        <meta property="og:description" content="{{ Config::get('app.description') }}">

        {{-- Twitter Card --}}
        <meta name="twitter:title"       content="{{ $title }}">
        <meta name="twitter:card"        content="summary_large_image">
        <meta name="twitter:image"       content="{{ URL::asset('images/card.png') }}">
        <meta name="twitter:description" content="{{ Config::get('app.description') }}">

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ URL::asset('images/logo.png') }}">

        {{-- Vite --}}
        @vite(['bootstrap/app.js'])

    </head>

    {{-- Body --}}
    <body class="font-sans leading-none {{ Config::get('app.env') }} {{ Env::get('APP_DUSK') }}">

        {{-- Routes --}}
        @routes()

        {{-- Inertia --}}
        @inertia()

    </body>

</html>