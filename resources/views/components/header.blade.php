  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>

  <body class="font-montserrat text-gray-900">
    <div class="relative overflow-hidden bg-gray-200 px-24 py-20">
      <header>
        <nav>
          <ul class="flex items-center gap-16 text-xl">
            <a href="{{ url('/') }}" class="class= text-4xl font-bold"z-10"">TASTY FOOD</a>
            <a href="{{ url('/') }}" class="z-10">HOME</a>
            <a href="{{ url('/about') }}" class="z-10">TENTANG</a>
            <a href="{{ url('/news') }}" class="z-10">BERITA</a>
            <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
            <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
          </ul>
        </nav>
      </header>
      <img src="{{ asset('images/food_png/img-4-2000x2000.png') }}" alt="bg-image"
        class="size-250 -right-65 absolute bottom-5 z-0">
