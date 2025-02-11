<!DOCTYPE html>
<html lang="{{ session('locale', config('app.locale')) }}" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/favicon.png')}}" />
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MB3VJX5L');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <livewire:components.layouts.navbar.top-navigation />
    {{ $slot }}
    <livewire:components.layouts.navbar.bottom-navigation />
    @stack('scripts')
</body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MB3VJX5L" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

</html>