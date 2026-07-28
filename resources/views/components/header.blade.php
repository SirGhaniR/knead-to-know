  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>

  <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
    <div class="py-18 relative overflow-hidden bg-gray-200 px-20">
      <header>
        <nav>
          <ul class="flex items-center gap-12">
            <a href="{{ url('/') }}" class="class= text-xl font-bold"z-10"">TASTY FOOD</a>
            <a href="{{ url('/') }}" class="z-10">HOME</a>
            <a href="{{ url('/about') }}" class="z-10">TENTANG</a>
            <a href="{{ url('/news') }}" class="z-10">BERITA</a>
            <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
            <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
          </ul>
        </nav>
      </header>
      <img src="{{ asset('images/food_png/img-4-2000x2000.png') }}" alt="bg-image"
        class="size-200 translate-x-50 -translate-y-35 absolute right-0 top-0 z-0">
