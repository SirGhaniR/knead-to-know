@props(['title' => 'KNEAD TO KNOW'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }}</title>
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body class="font-montserrat bg-gray-50 text-sm text-gray-900">
  <x-layout.sidebar />

  <main>
    {{ $slot }}
  </main>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      offset: 120,
      once: true,
      easing: 'ease-out-cubic'
    });
  </script>
</body>

</html>
