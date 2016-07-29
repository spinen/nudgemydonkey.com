<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Nudge My Donkey')</title>
        {{--Styles --}}
         <link href="{{ elixir('css/app.css') }}"  type="text/css" rel="stylesheet">

    </head>
    <body>
        <app></app>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
