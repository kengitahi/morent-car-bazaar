<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?  "$title | Morent" : 'Morent' }}</title>
</head>

<body class="antialiased">
    <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</body>

</html>