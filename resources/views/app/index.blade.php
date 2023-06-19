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

        {{-- Fonts --}}
        <link rel="stylesheet" href="{{ Config::get('theme.fonts') }}">

        {{-- Icons --}}
        <script src="{{ Config::get('theme.icons') }}" crossorigin="anonymous"></script>

        {{-- Analytics --}}
        @if (Config::get('services.google.analytics.key'))
            @production

                <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','{{ Config::get('services.google.analytics.key') }}');</script>
                <!-- End Google Tag Manager -->

            @endproduction
        @endif

        {{-- Slot --}}
        @includeIf('views.head')

        {{-- Vite --}}
        @vite(['bootstrap/app.js'])

    </head>

    {{-- Body --}}
    <body class="font-sans leading-none {{ Config::get('app.env') }} {{ Env::get('APP_DUSK') }}">

        {{-- Analytics --}}
        @if (Config::get('services.google.analytics.key'))
            @production

                <!-- Google Tag Manager (noscript) -->
                <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ Config::get('services.google.analytics.key') }}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
                <!-- End Google Tag Manager (noscript) -->

            @endproduction
        @endif

        {{-- Routes --}}
        @routes()

        {{-- Inertia --}}
        @inertia()

    </body>

</html>