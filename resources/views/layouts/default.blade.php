<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="wrapper">
        @include('front.partials.sidebar')
        <div id="content">
            @include('front.partials.navbar')
            @yield('content')
            @include('front.partials.footer')
        </div>
    </div>
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>