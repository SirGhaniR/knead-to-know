@props(['title' => 'TASTY FOOD'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }}</title>
  @vite('resources/css/app.css')
</head>

<body class="font-montserrat bg-gray-50 text-sm text-gray-900">
  <x-layout.sidebar />

  <main>
    {{ $slot }}
  </main>

</body>

</html>
