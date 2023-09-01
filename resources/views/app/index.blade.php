{{-- HTML --}}
<!doctype html>
<html lang="{{ App::getLocale() }}">

    {{-- Head --}}
    <head>

        {{-- Title --}}
        <title>{{ $title ?? Config::get('app.name') }}</title>

        {{-- Meta --}}
        <meta name="format-detection" content="telephone=no">
        <meta name="robots"           content="{{ $robots ?? 'all' }}" />
        <meta name="Content-Type"     content="text/html; charset=UTF-8">
        <meta name="viewport"         content="width=device-width, initial-scale=1">
        <meta name="description"      content="{{ Config::get('app.description') }}">

        {{-- Open Graph --}}
        <meta property="og:type"        content="website">
        <meta property="og:title"       content="{{ $title ?? Config::get('app.name') }}">
        <meta property="og:url"         content="{{ Request::url() }}">
        <meta property="og:image"       content="{{ URL::asset('images/card.png') }}">
        <meta property="og:secure_url"  content="{{ URL::asset('images/card.png') }}">
        <meta property="og:description" content="{{ Config::get('app.description') }}">

        {{-- Twitter Card --}}
        <meta name="twitter:title"       content="{{ $title ?? Config::get('app.name') }}">
        <meta name="twitter:card"        content="summary_large_image">
        <meta name="twitter:image"       content="{{ URL::asset('images/card.png') }}">
        <meta name="twitter:description" content="{{ Config::get('app.description') }}">

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ URL::asset('images/logo.png') }}">

        {{-- Fonts --}}
        <link rel="stylesheet" href="{{ Config::get('services.type_kit.url') }}">

        {{-- Icons --}}
        <script src="{{ Config::get('services.font_awesome.url') }}" crossorigin="anonymous"></script>

        {{-- Analytics --}}
        @production

            {{-- Google Tag Manager --}}
            @if (Config::get('services.google.analytics.key'))
                <script>
                    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                    })(window,document,'script','dataLayer','{{ Config::get('services.google.analytics.key') }}');
                </script>
            @endif

            {{-- Meta Pixel --}}
            @if (Config::get('services.meta.analytics.key'))
                <script>
                    !function(f,b,e,v,n,t,s)
                    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                    n.queue=[];t=b.createElement(e);t.async=!0;
                    t.src=v;s=b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t,s)}(window, document,'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                    fbq('init', '{{ Config::get('services.meta.analytics.key') }}');
                    fbq('track', 'PageView');
                </script>
            @endif

        @endproduction

        {{-- Vite --}}
        @vite(['bootstrap/app.js'])

    </head>

    {{-- Body --}}
    <body class="font-sans leading-none {{ Config::get('app.env') }} {{ Env::get('APP_DUSK') }}">

        {{-- Analytics --}}
        @production

            {{-- Google Tag Manager --}}
            @if (Config::get('services.google.analytics.key'))
                <noscript>
                    <iframe width="0"
                            height="0"
                            style="display:none;visibility:hidden"
                            src="https://www.googletagmanager.com/ns.html?id={{ Config::get('services.google.analytics.key') }}">
                    </iframe>
                </noscript>
            @endif

            {{-- Meta Pixel --}}
            @if (Config::get('services.meta.analytics.key'))
                <noscript>
                    <img width="1"
                         height="1"
                         style="display:none"
                         src="https://www.facebook.com/tr?id={{ Config::get('services.meta.analytics.key') }}&ev=PageView&noscript=1" />
                </noscript>
            @endif

        @endproduction

        {{-- Routes --}}
        @routes()

        {{-- Inertia --}}
        @inertia()

    </body>

</html>