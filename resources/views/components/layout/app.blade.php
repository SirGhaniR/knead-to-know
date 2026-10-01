@props(['title' => 'KNEAD TO KNOW'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" rel="stylesheet"
      integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
      crossorigin="anonymous" referrerpolicy="no-referrer">
  </head>

  <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
    <main class="max-w-full overflow-x-hidden">
      {{ $slot }}
    </main>

    <x-layout.footer />

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        offset: 0,
        once: true,
        mirror: false,
        anchorPlacement: 'top-bottom',
        easing: 'ease-out-cubic',
      });
    </script>
    <script>
      document.querySelectorAll('[data-collapse-toggle]').forEach(btn => {
        const menu = document.getElementById(btn.getAttribute('data-collapse-toggle'));
        if (!menu) return;
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopImmediatePropagation();
          menu.classList.toggle('open');
        }, true);
      });
    </script>
  </body>
</html>
