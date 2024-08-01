<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    @routes

    @vite('resources/js/app.js')

    @inertiaHead

</head>

<body>

    @inertia

</body>

</html>
