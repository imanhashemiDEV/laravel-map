<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Map</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class=" bg-yellow-300">
{{$slot}}
</body>
</html>

