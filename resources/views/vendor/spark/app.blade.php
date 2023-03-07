{{-- HTML --}}
<!doctype html>
<html lang="{{ App::getLocale() }}">

    {{-- Head --}}
    <head>

        {{-- Meta --}}
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        {{-- Title --}}
        <title>{{ Config::get('app.name') }} - Billing</title>

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ URL::asset('images/logo.png') }}">

        {{-- Styles --}}
        <style>
            {!! file_get_contents($cssPath) !!}
            .bg-custom-hex { background-color: {!! Config::get('spark.brand.color') !!} }
            #sideBar h1 { padding-left: 36px; font-size: 25px; background: url('{{ URL::asset('images/logo.png') }}') no-repeat 0% 6px/25px; margin-bottom: 30px }
            #sideBar h2 { margin-bottom: -45px }
            #sideBar h2 + div { margin-bottom: -7px }
            #sideBar h2 + div + div + div { visibility: hidden; position: relative; }
            #sideBar h2 + div + div + div::after { visibility: visible; position: absolute; top: 0; left: 0; content: "The billing portal allows you to conveniently manage your subscription plan, payment method, and download your recent invoices." }
            #sideBar div.underline { text-decoration: none }
            #topNavReturnLink { background: transparent; box-shadow: none }
            #topNavReturnLink * { display: none }
        </style>

        <!-- Scripts -->
        <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.20/lodash.min.js" integrity="sha512-90vH1Z83AJY9DmlWa8WkjkV79yfS2n2Oxhsi2dZbIv0nC4E6m5AbH8Nh156kkM7JePmqD6tcZsfad1ueoaovww==" crossorigin="anonymous"></script>

    </head>

    {{-- Body --}}
    <body class="font-sans">

        {{-- Inertia --}}
        @inertia

        {{-- Scripts --}}
        <script>
            window.translations = <?php echo $translations; ?>;
            {!! file_get_contents($jsPath) !!}
        </script>

    </body>

</html>