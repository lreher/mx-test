<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MX Testo</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script defer src="{{ mix('js/app.js') }}"></script>
    </head>

    <body>
        <div id='app'>
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>