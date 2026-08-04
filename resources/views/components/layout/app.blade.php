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
  <x-layout.header />

  <main class="max-w-full overflow-x-hidden">
    {{ $slot }}
  </main>

  <x-layout.footer />

  <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
