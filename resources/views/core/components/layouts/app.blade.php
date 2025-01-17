<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <livewire:components.layouts.navbar.top-navigation />
    {{ $slot }}
    <livewire:components.layouts.navbar.bottom-navigation />
</body>

</html>