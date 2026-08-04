@php
  $currentPath = request()->path();
  $isHome = $currentPath === '/';
@endphp

@if ($isHome)
  <div class="lg:py-18 relative overflow-hidden bg-gray-200 px-4 py-12 sm:px-8 md:px-12 lg:px-20">
    <header>
      <nav>
        <div class="flex flex-wrap items-center gap-4 md:gap-6 lg:gap-12">
          <a href="#" class="z-10 text-2xl font-bold sm:text-3xl">KTK</a>

          <button data-collapse-toggle="navbar-home" type="button"
            class="inline-flex cursor-pointer items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden"
            aria-controls="navbar-home" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
            </svg>
          </button>

          <div class="my-8 hidden w-full lg:flex lg:w-auto lg:items-center" id="navbar-home">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-6 xl:gap-12">
              <a href="#" class="z-10 text-sm sm:text-base">HOME</a>
              <a href="{{ url('/about') }}" class="z-10 text-sm sm:text-base">TENTANG</a>
              <a href="{{ url('/news') }}" class="z-10 text-sm sm:text-base">BERITA</a>
              <a href="{{ url('/gallery') }}" class="z-10 text-sm sm:text-base">GALERI</a>
              <a href="{{ url('/contact') }}" class="z-10 text-sm sm:text-base">KONTAK</a>
              @auth
                <form action="{{ url('/logout') }}" method="post" class="z-10">
                  @csrf
                  <button type="submit"
                    class="w-full cursor-pointer bg-gray-900 px-4 py-2 text-sm font-bold text-gray-200 transition-colors hover:opacity-90 sm:px-5 sm:text-base lg:w-auto">LOGOUT</button>
                </form>
              @else
                <x-ui.button :href="url('/auth')" class="px-4! py-2! sm:px-5! z-10 w-full lg:w-auto">LOGIN</x-ui.button>
              @endauth
            </div>
          </div>
        </div>
      </nav>
    </header>
    <img src="{{ asset('images/food_png/sourdough_loaf_2.png') }}" alt="bg-image"
      class="lg:h-200 lg:translate-x-90 lg:-translate-y-30 md:h-100 translate-x-30 absolute right-0 top-0 z-0 h-60 w-auto -translate-y-10 object-contain opacity-100 md:-translate-y-40 md:translate-x-40">
  @else
    <div class="lg:py-18 bg-gray-200 px-4 py-12 text-gray-50 sm:px-8 md:px-12 lg:px-20"
      style="background-image: url({{ asset('images/foods/background.jpg') }}); background-size: cover; background-position: center;">
      <header>
        <nav>
          <div class="flex flex-wrap items-center justify-between">
            <a href="{{ url('/') }}" class="z-10 text-2xl font-bold sm:text-3xl">KTK</a>

            <button data-collapse-toggle="navbar-other" type="button"
              class="inline-flex cursor-pointer items-center rounded-lg p-2 text-sm text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden"
              aria-controls="navbar-other" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"></path>
              </svg>
            </button>

            <div class="my-8 hidden w-full lg:flex lg:w-auto lg:items-center" id="navbar-other">
              <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:gap-6 xl:gap-12">
                <a href="{{ url('/') }}" class="z-10 text-sm sm:text-base">HOME</a>
                <a href="{{ url('/about') }}" class="z-10 text-sm sm:text-base">TENTANG</a>
                <a href="{{ url('/news') }}" class="z-10 text-sm sm:text-base">BERITA</a>
                <a href="{{ url('/gallery') }}" class="z-10 text-sm sm:text-base">GALERI</a>
                <a href="{{ url('/contact') }}" class="z-10 text-sm sm:text-base">KONTAK</a>
                @auth
                  <form action="{{ url('/logout') }}" method="post" class="z-10">
                    @csrf
                    <button type="submit"
                      class="w-full cursor-pointer bg-gray-900 px-4 py-2 text-sm font-bold text-gray-200 transition-colors hover:opacity-90 sm:px-5 sm:text-base lg:w-auto">LOGOUT</button>
                  </form>
                @else
                  <x-ui.button :href="url('/auth')" :variant="'light'"
                    class="px-4! py-2! sm:px-5! z-10 w-full lg:w-auto">LOGIN</x-ui.button>
                @endauth
              </div>
            </div>
          </div>
        </nav>
      </header>
@endif
