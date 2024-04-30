<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : config('app.name', 'Market Store Api') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="w-full min-h-screen flex flex-col justify-start items-start  bg-gray-100">
        <div class="w-full">
            {{ $slot }}
            </main>
        </div>
    </div>
    <script src="{{ asset('/assets/js/jquery_3_7_1.js') }}"></script>
    <script src="{{ asset('/assets/js/doc_scripts.js') }}"></script>
    <script src="{{ asset('/assets/js/clientes.js') }}"></script>
</body>

</html>
