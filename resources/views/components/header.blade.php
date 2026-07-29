  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>

  @switch(request()->path())
    @case('/')
      {{-- home --}}

      <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
        <div class="py-18 relative overflow-hidden bg-gray-200 px-20">
          <header>
            <nav>
              <ul class="flex items-center gap-12">
                <a href="#" class="z-10 text-xl font-bold">TASTY FOOD</a>
                <a href="#" class="z-10">HOME</a>
                <a href="{{ url('/about') }}" class="z-10" target="_blank">TENTANG</a>
                <a href="{{ url('/news') }}" class="z-10" target="_blank">BERITA</a>
                <a href="{{ url('/gallery') }}" class="z-10" target="_blank">GALERI</a>
                <a href="{{ url('/contact') }}" class="z-10" target="_blank">KONTAK</a>
              </ul>
            </nav>
          </header>
          <img src="{{ asset('images/food_png/img-4-2000x2000.png') }}" alt="bg-image"
            class="size-200 translate-x-50 -translate-y-35 absolute right-0 top-0 z-0">
        @break

        @case('about')

          <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
            <div class="py-18 bg-gray-200 px-20 text-gray-50"
              style="background-image: url({{ asset('images/foods/Group70@2x.png') }}); background-size: cover;">
              <header>
                <nav>
                  <ul class="flex items-center justify-between">
                    <a href="{{ url('/') }}" class="z-10 text-xl font-bold">TASTY FOOD</a>
                    <div class="flex gap-12">
                      <a href="{{ url('/') }}" class="z-10">HOME</a>
                      <a href="{{ url('#') }}" class="z-10">TENTANG</a>
                      <a href="{{ url('/news') }}" class="z-10">BERITA</a>
                      <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
                      <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
                    </div>
                  </ul>
                </nav>
              </header>
            @break

            @case('news')

              <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
                <div class="py-18 bg-gray-200 px-20 text-gray-50"
                  style="background-image: url({{ asset('images/foods/Group70@2x.png') }}); background-size: cover;">
                  <header>
                    <nav>
                      <ul class="flex items-center justify-between">
                        <a href="{{ url('/') }}" class="z-10 text-xl font-bold">TASTY FOOD</a>
                        <div class="flex gap-12">
                          <a href="{{ url('/') }}" class="z-10">HOME</a>
                          <a href="{{ url('/about') }}" class="z-10">TENTANG</a>
                          <a href="#" class="z-10">BERITA</a>
                          <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
                          <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
                        </div>
                      </ul>
                    </nav>
                  </header>
                @break

                @case('gallery')

                  <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
                    <div class="py-18 bg-gray-200 px-20 text-gray-50"
                      style="background-image: url({{ asset('images/foods/Group70@2x.png') }}); background-size: cover;">
                      <header>
                        <nav>
                          <ul class="flex items-center justify-between">
                            <a href="{{ url('/') }}" class="z-10 text-xl font-bold">TASTY FOOD</a>
                            <div class="flex gap-12">
                              <a href="{{ url('/') }}" class="z-10">HOME</a>
                              <a href="{{ url('/about') }}" class="z-10">TENTANG</a>
                              <a href="{{ url('/news') }}" class="z-10">BERITA</a>
                              <a href="{{ url('#') }}" class="z-10">GALERI</a>
                              <a href="{{ url('/contact') }}" class="z-10">KONTAK</a>
                            </div>
                          </ul>
                        </nav>
                      </header>
                    @break

                    @case('contact')

                      <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
                        <div class="py-18 bg-gray-200 px-20 text-gray-50"
                          style="background-image: url({{ asset('images/foods/Group70@2x.png') }}); background-size: cover;">
                          <header>
                            <nav>
                              <ul class="flex items-center justify-between">
                                <a href="{{ url('/') }}" class="z-10 text-xl font-bold">TASTY FOOD</a>
                                <div class="flex gap-12">
                                  <a href="{{ url('/') }}" class="z-10">HOME</a>
                                  <a href="{{ url('/about') }}" class="z-10">TENTANG</a>
                                  <a href="{{ url('/news') }}" class="z-10">BERITA</a>
                                  <a href="{{ url('/gallery') }}" class="z-10">GALERI</a>
                                  <a href="{{ url('#') }}" class="z-10">KONTAK</a>
                                </div>
                              </ul>
                            </nav>
                          </header>
                        @break

                        @default

                          <body class="font-montserrat bg-gray-50 text-sm text-gray-900">
                            <div class="py-18 relative overflow-hidden bg-gray-200 px-20">
                              <header>
                                <nav>
                                  <ul class="flex items-center gap-12">
                                    <a href="{{ url('/') }}" class="z-10 text-xl font-bold" target="_blank">TASTY
                                      FOOD</a>
                                    <a href="{{ url('/') }}" class="z-10" target="_blank">HOME</a>
                                    <a href="{{ url('/about') }}" class="z-10" target="_blank">TENTANG</a>
                                    <a href="{{ url('/news') }}" class="z-10" target="_blank">BERITA</a>
                                    <a href="{{ url('/gallery') }}" class="z-10" target="_blank">GALERI</a>
                                    <a href="{{ url('/contact') }}" class="z-10" target="_blank">KONTAK</a>
                                  </ul>
                                </nav>
                              </header>
                              <img src="{{ asset('images/food_png/img-4-2000x2000.png') }}" alt="bg-image"
                                class="size-200 translate-x-50 -translate-y-35 absolute right-0 top-0 z-0">
                          @endswitch
